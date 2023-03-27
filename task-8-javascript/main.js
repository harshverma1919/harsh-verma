
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
        "Error: " + "Please enter integer value.";
      return;
    }
    let n = parseInt(number);
    let m = parseInt(times);
    if (m > n) {
      document.getElementById("error").innerHTML =
        "Error: " + "Times should not be greater than than number";
      return;
    }
    if (m <= 0) {
      document.getElementById("error").innerHTML =
        "Error: " + "Times should be a Positive Number";
      return;
    }
  
    let rem = number;
    for (let i = 0; i < times; i++) {
      const eachSplit = Math.ceil(rem / (times - i));
      rem -= eachSplit;
  
      const div = document.createElement("div");
      div.innerHTML = eachSplit;
      div.style.display = "inline-block";
      div.style.width = `${(eachSplit / n) * 100}%`;
      div.style.backgroundColor = colors[i % colors.length];
      div.style.border = "1px solid black";
      div.style.height = "30%";
      div.style.fontSize = "2em";
      div.style.textAlign = "center";

  
      result.appendChild(div);
    }
  }
  