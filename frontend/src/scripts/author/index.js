class Author {
  constructor() {
    this.authorProfileImgContainer = document.querySelector(
      "#author-profile-img span",
    );
    this.authorFirstNameText = document
      .getElementById("#author-firstname")
      .text();
    this.authorLastNameText = document
      .getElementById("#author-lastname")
      .text();

    this.init();
  }

  init() {
    if (!this.authorProfileImgContainer.length) {
      return null;
    }

    let initials =
      this.authorFirstNameText.charAt(0) + this.authorLastNameText.charAt(0);
    initials = initials ? initials : "A";

    // Set the text.
    this.authorProfileImgContainer.text(initials);
  }
}

new Author();
