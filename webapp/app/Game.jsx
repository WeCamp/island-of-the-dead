import React from "react";
import Col from 'react-bootstrap';
import Row from 'react-bootstrap';
import Maps from './Maps.jsx';
const API_URL = 'http://island-of-the-dead.stevendevries.nl';
// LOCAL IP
//const API URL = 'http://islandofthedead.com';

export default class Game extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      latitude: 52.3725,
      longitude: 5.634,
      status: null,
      gameId: 1,
      objectsInGame: null
    }
    this.timeout;
  }
  displayStateInConsole() {
    console.log("gameState:", this.state.status, "gameId:", this.state.gameId, "latitude:", this.state.latitude, "longitude:", this.state.longitude, "objectsInGame", this.state.objectsInGame);
  }
  componentDidMount() {
    console.log("componentDidMount");
    this.startGame();
    // this.getGeoLocationAndUpdateMap();
  }
  startGame() {
    var formData = new FormData();
    formData.set("latitude", this.props.latitude);
    formData.set("longitude", this.props.longitude);

    var myInit = { method: 'POST',
             body: formData };
    fetch(`${API_URL}/game/start`, myInit)
      .then(function(response) {
        return response.json();
      })
      .then((jsonResponse) => {
        this.getGeoLocationAndUpdateMap(jsonResponse.gameId);
      })
  }
  getGeoLocationAndUpdateMap(gameId) {
    var lat;
    var lon;

    navigator.geolocation.getCurrentPosition((position) => {
      lat = position.coords.latitude;
      lon = position.coords.longitude;

      var formData = new FormData();
      formData.set("latitude", lat);
      formData.set("longitude", lon);

      var myInit = { method: 'POST',
               body: formData };

      fetch(`${API_URL}/player/move/${gameId}`, myInit)
        .then(function(response) {
          console.log("fetching data from backend");
          return response.json();
        })
        .then((jsonResponse) => {
          this.setState({
            gameId: gameId,
            status: jsonResponse.state,
            latitude: lat,
            longitude: lon,
            objectsInGame: jsonResponse.occupants
          });
        }).then(() => {
          this.timeout = setTimeout(() => {
            this.getGeoLocationAndUpdateMap(gameId);
          }, 5000);
        });
    });
  }
  componentWillUnmount() {
    clearTimeout(this.timeout);
  }

  render() {
    {this.displayStateInConsole()}
    if (this.state.status === null) {
      return(
        <div className="game-loading">
          Game Loading ...
        </div>
      );
    }
    if (this.state.status === 'LOST') {
      return (
        <div className="game-lost">
          Game Lost ...
        </div>
      );
    }
    if (this.state.status === 'WON') {
      return (
        <div className="game-won">
          Game Won ...
        </div>
      );
    }
    const coordinates = {lat: this.state.latitude, lng: this.state.longitude}
    return (
      <div className="maps-component">
        <Maps location={coordinates} gameId={this.state.gameId} objects={this.state.objectsInGame} />
      </div>
    );
  }
};
