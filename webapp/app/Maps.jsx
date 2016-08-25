var React = require("react");
var GoogleMap = require("google-map-react");

var Maps = React.createClass({
  getDefaultProps: function() {
   return {
     center: {lat: 52.373486, lng: 5.637864},
     zoom: 9
    };
  },
  render() {
    return (
       <GoogleMap
        defaultCenter={this.props.center}
        defaultZoom={this.props.zoom}>
      </GoogleMap>
    );
  }
});


module.exports = Maps;
