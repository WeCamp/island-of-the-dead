import React from "react";
import Col from 'react-bootstrap';
import Row from 'react-bootstrap';
import Maps from './Maps.jsx';

export default class App extends React.Component {
  constructor(props) {
    super(props);
  }
  componentDidMount() {
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
  }
  render() {
    console.log("rendering component");
    return (
      <div className="maps-component">
        <Maps />
      </div>
    );
  }
};
