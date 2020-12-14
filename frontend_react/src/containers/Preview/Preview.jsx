import React from 'react';
import './Preview.scss';
import LogoOfiplus from '../../img/LogoOfiplus.png'
import blue_setup from '../../img/blue_setup.jpg'

function Preview () {

  return (
    <div className="header">
      <div className="header_top">
        <div className="header_top_logo">
          <img src={LogoOfiplus} className="imgLogo"></img>
        </div>
        <div className="header_top_buttons">
          <button className="reg-log-button">Register</button>
          <button className="reg-log-button">Login</button>
        </div>
      </div>
      <div className="header_middle">
        <div className="header_middle_info">
          <div className="middle_name">Ofinetplus</div>
            <div className="information">
              <div className="description1">Bienvenido al Chiquito Ipsum, el generador de texto de relleno para tus diseños de antes de los dolores.  Dale a "Fistrum" para que te salga ese pedaso de texto Chiquito en estado puro. Si te crees muy moderno dale a "Latin" que te lo pongo  con cuarto y mitad de romanooo...
              </div>
              <div className="description2">
                <div className="row">adsf</div>
                <div className="row">asdf</div>
                <div className="row">asdf</div>
              </div>
            </div>
        </div>
        <div className="header_middle_img">
          <img src={blue_setup} className="blue_setup"></img>
        </div>
        
      </div>
    </div>
  )
}

export default Preview;