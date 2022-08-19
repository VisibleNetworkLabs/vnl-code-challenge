// inputs 30, 0, 41, 101, 123454321
const function2 = (x) => {
    return x === Number(x.toString().split("").reverse().join(""));
};

function2(30) // answer here
function2(0) // 
function2(41) // 
function2(101) //
function2(123454321) //
