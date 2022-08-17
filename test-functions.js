// Q1
// inputs (1,2), ('hot', 'dog'), (1, '2'), ([1,2], [3,4])
const function1 = (a, b) => {
    return a + b
}

// Q2
// inputs 30, 0, 41, 101, 123454321
const function2 = (x) => {
    return x === Number(x.toString().split("").reverse().join(""));
};

console.log(function1(1, 2))
console.log(function1('hot', 'dog'))
console.log(function1(1, '2'))
console.log(function1([1, 2], [3, 4]))
console.log(function2(30))
console.log(function2(0))
console.log(function2(41))
console.log(function2(101))
console.log(function2(123454321))
