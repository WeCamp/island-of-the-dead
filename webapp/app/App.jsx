import React from "react";
import Col from 'react-bootstrap';
import Row from 'react-bootstrap';
import Maps from './Maps.jsx';

export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      latitude: null,
      longitude: null,
      state: null,
      gameId: null,
    }
  }
  componentDidMount() {
    console.log("componentDidMount");

    // yes, this is ugly :)
    var that = this;
    var lat;
    var lon;

    navigator.geolocation.getCurrentPosition(function(position) {
      lat = position.coords.latitude;
      lon = position.coords.longitude;

      var formData = new FormData();
      formData.set("latitude", lat);
      formData.set("longitude", lon);

      var myInit = { method: 'POST',
               body: formData };

      fetch('http://islandofthedead.com/game/start', myInit)
        .then(function(response) {
          return response.json();
        })
        .then(function(jsonResponse) {
          that.setState({
            state: jsonResponse.state,
            gameId: jsonResponse.gameId,
            latitude: lat,
            longitude: lon,
          });
        });
    });

  }

  componentWillUpdate() {

  }
  render() {
    console.log(this.state.state, this.state.gameId, this.state.latitude, this.state.longitude);
    const coordinates = {lat: this.state.latitude, lng: this.state.longitude}
    console.log("rendering component");
    return (
      <div className="maps-component">
      </div>
    );
  }
};
