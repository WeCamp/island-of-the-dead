import React from "react";
import Col from 'react-bootstrap';
import Row from 'react-bootstrap';
import Maps from './Maps.jsx';

export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      data: null,
      latitude: 52.373486,
      longitude: 5.637864,
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
      console.log(lat,lon);
      that.setState({
        latitude: lat,
        longitude: lon,
      });
    });

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
  }
  render() {
    const coordinates = {lat: this.state.latitude, lng: this.state.longitude}
    console.log("rendering component");
    return (
      <div className="maps-component">
        <Maps center={coordinates}/>
      </div>
    );
  }
};
