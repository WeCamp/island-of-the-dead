import React from "react";
import ReactDOM from "react-dom";
import Game from "./Game.jsx";

function render(){
  ReactDOM.render(<Game />, document.getElementById("app"));
}

render();
