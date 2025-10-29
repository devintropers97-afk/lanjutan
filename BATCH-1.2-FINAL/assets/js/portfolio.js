/**
 * Portfolio Filter JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Get all filter buttons
    const filterBtns = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');
    
    // Show all items by default
    portfolioItems.forEach(item => {
        item.classList.add('active');
    });
    
    // Add click event to each filter button
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons
            filterBtns.forEach(b => b.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Get filter category
            const category = this.getAttribute('data-filter');
            
            // Filter items
            portfolioItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.classList.add('active');
                } else {
                    item.classList.remove('active');
                }
            });
        });
    });
    
    // Search functionality (if search box exists)
    const searchBox = document.getElementById('portfolioSearch');
    if (searchBox) {
        searchBox.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            
            portfolioItems.forEach(item => {
                const title = item.querySelector('.portfolio-title').textContent.toLowerCase();
                const description = item.querySelector('.portfolio-info p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || description.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    }
});
