class LoadMore {
  /**
   * Contructor.
   */
  constructor() {
    this.ajaxUrl = siteConfig?.ajaxUrl ?? "";
    this.ajaxNonce = siteConfig?.ajax_nonce ?? "";
    this.loadMoreBtn = document.getElementById("load-more");
    this.loadingTextEl = document.getElementById("loading-text");
    this.isRequestProcessing = false;

    this.options = {
      root: null,
      rootMargin: "0px",
      threshold: 1.0, // 1.0 means set isIntersecting to true when element comes in 100% view.
    };

    this.init();
  }

  init() {
    if (!this.loadMoreBtn.length) {
      return;
    }

    this.totalPagesCount = document
      .getElementById("post-pagination")
      .getAttribute("max-pages");

    /**
     * Add the IntersectionObserver api, and listen to the load more intersection status.
     * so that intersectionObserverCallback gets called if the element intersection status changes.
     *
     * @type {IntersectionObserver}
     */
    const observer = new IntersectionObserver(
      (entries) => this.intersectionObserverCallback(entries),
      this.options,
    );
    observer.observe(this.loadMoreBtn[0]);
  }

  /**
   * Gets called on initial render with status 'isIntersecting' as false and then
   * everytime element intersection status changes.
   *
   * @param {array} entries No of elements under observation.
   *
   */
  intersectionObserverCallback(entries) {
    // array of observing elements

    // The logic is apply for each entry ( in this case it's just one loadmore button )
    entries.forEach((entry) => {
      // If load more button in view.
      if (entry?.isIntersecting) {
        this.handleLoadMorePosts();
      }
    });
  }

  /**
   * Load more posts.
   *
   * 1.Make an ajax request, by incrementing the page no. by one on each request.
   * 2.Append new/more posts to the existing content.
   * 3.If the response is 0 ( which means no more posts available ), remove the load-more button from DOM.
   * Once the load-more button gets removed, the IntersectionObserverAPI callback will not be triggered, which means
   * there will be no further ajax request since there won't be any more posts available.
   *
   * @return null
   */
  handleLoadMorePosts() {
    // Get page no from data attribute of load-more button.
    const page = this.loadMoreBtn.data("page");
    if (!page || this.isRequestProcessing) {
      return null;
    }

    const nextPage = parseInt(page) + 1; // Increment page count by one.
    this.isRequestProcessing = true;

    const xhr = new XMLHttpRequest();
    const params = new URLSearchParams({
      page: page,
      action: "load_more",
      ajax_nonce: this.ajaxNonce,
    }).toString();

    xhr.open("POST", this.ajaxUrl, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          const response = xhr.responseText;
          this.loadMoreBtn.dataset.page = nextPage;
          document
            .getElementById("load-more-content")
            .insertAdjacentHTML("beforeend", response);
          this.removeLoadMoreIfOnLastPage(nextPage);
          this.isRequestProcessing = false;
        } else {
          console.error(xhr.responseText);
          this.isRequestProcessing = false;
        }
      }
    };

    xhr.send(params);
  }

  /**
   * Remove Load more Button If on last page.
   *
   * @param {int} nextPage New Page.
   */
  removeLoadMoreIfOnLastPage(nextPage) {
    if (nextPage + 1 > this.totalPagesCount) {
      this.loadMoreBtn.remove();
    }
  }
}

new LoadMore();
