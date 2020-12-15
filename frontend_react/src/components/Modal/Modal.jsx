import React, { useCallback, useEffect } from "react";
import "./Modal.scss";
import CloseIcon from "mdi-react/CloseIcon";

function Modal(props) {
  const showHideClassName = props.show
    ? "modal display-block"
    : "modal display-none";

  const escFunction = useCallback((event) => {
    if (event.keyCode === 27) {
      props.handleClose();
    }
  }, []);
  useEffect(() => {
    document.addEventListener("keydown", escFunction, false);
    return () => {
      document.removeEventListener("keydown", escFunction, false);
    };
  }, []);

  const headerModal = {
    0: "modal-error",
    1: "modal-warning",
    2: "modal-ok",
    3: "modal-default",
  };

  const classes = `modal-header ${headerModal[props.header]}`;

  return (
    <div className={showHideClassName}>
      <section className="modal-main">
        <div className={classes}>
        <div className={"redButton"} onClick={props.handleClose}>
                  {" "}
                  <span role="img" aria-label="Cancel">
                    <CloseIcon className="verticalAlignIcons" />
                  </span>{" "}
                </div>
          <div className="modal-title">{props.title}</div>
        </div>
        <div className="modal-body">{props.children}</div>
        <div className="modal-footer"></div>
      </section>
    </div>
  );
}

export default Modal;