var React = require("react");

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
        {this.state.data.gameId}
        First React Item hooray yay yay
      </div>
    );
  }
});


module.exports = App;
