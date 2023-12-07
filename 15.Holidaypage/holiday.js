// Get all tab elements
const tabs = document.querySelectorAll('.tab');
const tabContents = document.querySelectorAll('.tab-content');

// Add click event listeners to each tab
tabs.forEach(tab => {
  tab.addEventListener('click', () => {
    const selectedTab = tab.dataset.tab;

    // Remove the active class from all tabs and tab contents
    tabs.forEach(tab => {
      tab.classList.remove('active');
    });

    tabContents.forEach(content => {
      content.classList.remove('active');
    });
    
    // Add the active class to the selected tab and tab content
    tab.classList.add('active');
    const selectedContent = document.getElementById(selectedTab);
    selectedContent.classList.add('active');
  });
});
