import React from 'react';
import Zombie from './mapObjects/Zombie.jsx';
import GoogleMap from 'google-map-react';
const API_KEY = 'AIzaSyC2CY6tmBR88gS6cw_v6hf7JM2CSKz6ZgA';

export default class Maps extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      objects: new Array(),
    }
  }
  componentWillReceiveProps(nextProps) {
    console.log("Maps Component - componentWillReceiveProps, gameId:", nextProps.gameId, "location:", nextProps.location);
    var that = this;
    fetch(`http://islandofthedead.com/game/${nextProps.gameId}`)
    .then(function(response) {
      return response.json();
    })
    .then(function(jsonResponse) {
      that.setState({
        objects: jsonResponse.occupants
      });
    });
  }
  renderObject(object) {
    return (
      <Zombie lat={object.latitude} lng={object.longitude} text={"zombie"} />
    );
  }
  render() {
    return (
       <GoogleMap
         bootstrapURLKeys={{
           key: API_KEY,
           language: 'nl'
         }}
        center={this.props.location}
        defaultCenter={this.props.defaultCenter}
        defaultZoom={this.props.zoom}>
        {this.state.objects.map(this.renderObject)}


      </GoogleMap>
    );
  }
}

Maps.defaultProps = {
  gameId: null,
  location: {lat: 52.373486, lng: 5.637864},
  defaultCenter: {lat: 52.373486, lng: 5.637864},
  zoom: 18,
};
