// const myNum = document.querySelectorAll('.count')
// // console.log(myNum.innerText)
// let speed = 20;

// myNum.forEach( (myCount) => {
    
    
//     let target_count = myCount.dataset.count;
//     let init_count = +myCount.innerText;
//     // console.log(target_count)
    
//     let new_increment_num = Math.floor(target_count / speed);
    
//     const updateNumber = () => {
//         init_count +=  new_increment_num;
//         myCount.innerText = init_count;
        
//         if(init_count < target_count){
//             setTimeout(() => {updateNumber()}, 200)
//         }
//     }
    
//     updateNumber();
    
// })

const counters = document.querySelectorAll('.count');
let speed = 100;

counters.forEach(counter => {
    const update = () => {
        const target = +counter.dataset.count;
        const current = +counter.innerText;
        const increment = target / speed;

        if (current < target) {
            counter.innerText = Math.ceil(current + increment);
            setTimeout(update, 20);
        } else {
            counter.innerText = target;
        }
    };

    update();
});
