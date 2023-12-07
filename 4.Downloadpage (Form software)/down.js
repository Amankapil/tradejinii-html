const accordionSections = document.querySelectorAll(".accordion-section");

accordionSections.forEach((section) => {
  const buttons = section.querySelectorAll(".accordion-button");
  const lists = section.querySelectorAll(".accordion-list");
  const text = section.querySelectorAll(".equit");

  buttons.forEach((button) => {
    button.addEventListener("click", () => {
      const target = button.getAttribute("data-target");

      buttons.forEach((btn) => {
        btn.classList.remove("active");
      });

      lists.forEach((list) => {
        list.classList.remove("active");
      });
      text.forEach((tax) => {
        tax.classList.remove("active");
      });

      button.classList.add("active");
      section.querySelector(`#${target}`).classList.add("active");
    });
  });
});
