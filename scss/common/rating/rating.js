{
    let ratingItems = document.querySelectorAll('.rating__stars');
    if(ratingItems.length) {
        ratingItems.forEach(rating => {
            let value = rating.dataset.value * 10;
            let progress = rating.querySelector('.rating__progress');
            progress.style.width = value + '%';
        })
    }
}