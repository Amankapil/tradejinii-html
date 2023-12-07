const accordionItems = document.querySelectorAll('.accordion-item');

accordionItems.forEach((item) => {
  const header = item.querySelector('.accordion-header');
  const icon = item.querySelector('.accordion-header i');

  header.addEventListener('click', () => {
    const isActive = item.classList.contains('active');
    
    // Close all accordion items
    accordionItems.forEach((otherItem) => {
      otherItem.classList.remove('active');
      otherItem.querySelector('.accordion-header i').classList.replace('fa-minus', 'fa-plus');
    });

    // Open or close the clicked accordion item
    if (!isActive) {
      item.classList.add('active');
      icon.classList.replace('fa-plus', 'fa-minus');
    }
  });
});


console.log("================================");
