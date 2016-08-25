var React = require("react");
var Col = require('react-bootstrap').Col;
var Row = require('react-bootstrap').Row;

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
    if (!this.state.data) {
      return (
        <div>
          No data found
        </div>
      );
    }
    return (
      <div>
        <Row>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
        </Row>
        <Row>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
        </Row>
        <Row>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
          <Col md={4}>GameId: {this.state.data.gameId}</Col>
        </Row>
      </div>
    );
  }
});


module.exports = App;
