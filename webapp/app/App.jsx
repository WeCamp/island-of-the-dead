var React = require("react");
var Col = require('react-bootstrap').Col;
var Row = require('react-bootstrap').Row;
var Maps = require('./Maps.jsx');

var App = React.createClass({
  getInitialState: function() {
    return {
      data: null,
    };
  },
  componentDidMount: function() {
    console.log("componentDidMount");

    // yes, this is ugly :)
    var that = this;

    fetch('http://islandofthedead.com/surroundings')
    .then(function(response) {
      return response.json();
    })
    .then(function(jsonResponse) {
      var data = jsonResponse;
      that.setState({
        data: data
      });
    });
  },

  render: function() {
    console.log("rendering component");
    return (
      <div>
        <Maps />
      </div>
    );
  }
});


module.exports = App;
