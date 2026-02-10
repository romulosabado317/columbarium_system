document.addEventListener('DOMContentLoaded', function() {
    fetch('../get_niches.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(niche => {
            let element = document.getElementById(`niche-${niche.id}`);
            if(!element) return;
            switch(niche.status){
                case 'available': element.style.backgroundColor = 'green'; break;
                case 'reserved': element.style.backgroundColor = 'yellow'; break;
                case 'occupied': element.style.backgroundColor = 'red'; break;
                default: element.style.backgroundColor = 'gray';
            }
        });
    })
    .catch(error => console.error('Error fetching niches:', error));

    document.querySelectorAll('.niche').forEach(niche => {
        niche.addEventListener('mouseover', () => niche.style.opacity = 0.7);
        niche.addEventListener('mouseout', () => niche.style.opacity = 1);
    });
});
