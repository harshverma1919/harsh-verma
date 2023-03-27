
const colors = [
    "#645CBB",
    "#30E3DF",
    "#BFDB38",
    "#F9F54B",
    "#8BF5FA",
    "#EA8FEA",
    
  ]; 
  function split() {
    const number = document.getElementById("number").value;
    const times = document.getElementById("times").value;
    const result = document.getElementById("result");
    result.innerHTML = "";
    document.getElementById("error").innerHTML = "";
    if (!Number.isInteger(Number(number)) || !Number.isInteger(Number(times))) {
      document.getElementById("error").innerHTML =
        "Error: " + "Please enter only integer value.";
      return;
    }
    let n = parseInt(number);
    let m = parseInt(times);
    if (m > n) {
      document.getElementById("error").innerHTML =
        "Error: " + "Splits should not be greater than than Inputnumber";
      return;
    }
    if (m <= 0) {
      document.getElementById("error").innerHTML =
        "Error: " + "Splits should be a Positive Number";
      return;
    }
  
    let rem = number;
    for (let i = 0; i < times; i++) {
      const eachSplit = Math.ceil(rem / (times - i));
      rem -= eachSplit;
  
      const div = document.createElement("div");
      div.innerHTML = eachSplit;
      div.style.display = "inline-block";
      div.style.width = `${100 / times}%`;
      div.style.backgroundColor = colors[i % colors.length];
  
      result.appendChild(div);
    }
  }
  