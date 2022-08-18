// inputs 30, 0, 41, 101, 123454321
const function2 = (x) => {
    return x === Number(x.toString().split("").reverse().join(""));
};

// console.log(function2(30))
// console.log(function2(0))
// console.log(function2(41))
// console.log(function2(101))
// console.log(function2(123454321))
