import React from 'react';
import Occupant from './mapObjects/Occupant.jsx';
import GoogleMap from 'google-map-react';
const API_KEY = 'AIzaSyC2CY6tmBR88gS6cw_v6hf7JM2CSKz6ZgA';

export default class Maps extends React.Component {
  constructor(props) {
    super(props);
  }
  renderObject(object) {
    return (
      <Occupant lat={object.latitude} lng={object.longitude} type={object.type} />
    );
  }
  componentWillReceiveProps(nextProps) {
    console.log("nextProps", nextProps);
  }
  render() {
    console.log("Maps", this.props.location);
    return (
       <GoogleMap
         bootstrapURLKeys={{
           key: API_KEY,
           language: 'nl'
         }}
        center={this.props.location}
        defaultZoom={this.props.zoom}>

        {this.props.objects.map(this.renderObject)}

      </GoogleMap>
    );
  }
}

Maps.defaultProps = {
  objects: null,
  gameId: null,
  location: {lat: 52.373486, lng: 5.637864},
  zoom: 18,
};
