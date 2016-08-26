import React from 'react';
import Occupant from './mapObjects/Occupant.jsx';
import GoogleMap from 'google-map-react';
const API_KEY = 'AIzaSyC2CY6tmBR88gS6cw_v6hf7JM2CSKz6ZgA';

export default class Maps extends React.Component {
  constructor(props) {
    super(props);
  }
  renderNonHumanObjects(object) {
    if (object.type !== 'Human Player') {
      return (
        <Occupant lat={object.latitude} lng={object.longitude} type={object.type} />
      );
    }
  }
  renderPlayer() {
    return (
      <Occupant lat={this.props.location.lat} lng={this.props.location.lng} type='Human Player' />
    )
  }
  render() {
    return (
       <GoogleMap
         bootstrapURLKeys={{
           key: API_KEY,
           language: 'nl'
         }}
        center={this.props.location}
        defaultZoom={this.props.zoom}>
        {this.renderPlayer()}
        {this.props.objects.map(this.renderNonHumanObjects)}

      </GoogleMap>
    );
  }
}

Maps.defaultProps = {
  objects: null,
  location: {lat: 52.373486, lng: 5.637864},
  zoom: 19,
};
