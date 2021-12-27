let start = Date.now();
let count = 1000000;
let initValue = 0;

let arr = new Array(count).fill(initValue);

let end = Date.now();

console.log("Array size: " + arr.length);
console.log("Filling " + count + " elements in " + (end - start) + " ms.");
