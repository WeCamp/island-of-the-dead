var React = require("react");
var ReactDOM = require("react-dom");
var App = require("./App.jsx");

function render(){
    ReactDOM.render(<App />, document.getElementById("app"));
}

render();
