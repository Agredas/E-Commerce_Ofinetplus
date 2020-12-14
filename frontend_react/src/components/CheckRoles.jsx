import React from 'react';
import Home from '../containers/Home/Home';
import AdminProfile from '../containers/AdminProfile/AdminProfile';

function CheckRoles(props) {

  const returnViewByRole = (props) => {
    console.log(props.client)
    if(props.client.role === 'admin'){
      return <AdminProfile client={props.client} setClient={props.setClient}/>
    }else{
      return <Home client={props.client} setClient={props.setClient}/>
    }
  }
  return (
    returnViewByRole(props)
  );
}

export default CheckRoles;