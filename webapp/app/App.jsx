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
  displayCol: function(i) {
    var content = this.state.data.fields[i];
    var contentInColumn = null;
    if (content.occupied !== null) {
      contentInColumn = content.occupied.type;
    }
    return (
      <Col xs={4} md={4}>{contentInColumn}</Col>
    );
  },
  displayField: function() {
    console.log("displayField");
    return (
      <div>
        <Row>
          {this.displayCol(0)}
          {this.displayCol(1)}
          {this.displayCol(2)}

        </Row>
        <Row>
          {this.displayCol(3)}
          {this.displayCol(4)}
          {this.displayCol(5)}
        </Row>
        <Row>
          {this.displayCol(6)}
          {this.displayCol(7)}
          {this.displayCol(8)}
        </Row>
      </div>
    );

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
        {this.displayField()}
      </div>
    );
  }
});


module.exports = App;
