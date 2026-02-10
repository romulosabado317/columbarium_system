document.addEventListener('DOMContentLoaded', function(){
    fetch('get_niches.php')
    .then(response => response.json())
    .then(data => {
        data.forEach(niche => {
            let element = document.getElementById(`niche-${niche.id}`);
            if(niche.status === 'available') element.style.backgroundColor = 'green';
            if(niche.status === 'reserved') element.style.backgroundColor = 'yellow';
            if(niche.status === 'occupied') element.style.backgroundColor = 'red';
        });
    });
});
