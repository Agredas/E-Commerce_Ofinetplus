import React from 'react';
import './Preview.scss';
import LogoOfiplus from '../../img/LogoOfiplus.png'
import blue_setup from '../../img/blue_setup.jpg'
import prev_img_1 from '../../img/prev_img_1.jpg'
import prev_img_2 from '../../img/prev_img_2.jpg'

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
              <div className="hole1"></div>
              <div className="description1">
                <img src={prev_img_1} className="prev_img_1"></img>              
              </div>
              <div className="description2">
                  <div className="row">Ofrecemos los mejores productos con buena relación calidad-precio.</div>
                  <div className="row">Disponemos de servicio técnico para arreglar cualquier problema.</div>
                  <div className="row">Programación a medida para ayudarte a ti y a tu empresa.</div>
                  <button className="contact_butt">Contact Us</button>
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