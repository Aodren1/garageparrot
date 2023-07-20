
var Alert = {
    nextBottomPosition: 10,
    showAlert: function(message, className, showCloseButton) {
      var alertDiv = document.createElement("div");
      alertDiv.innerHTML = message;
      alertDiv.className = "alert " + className;
      alertDiv.style.bottom = this.nextBottomPosition + "px";
      document.body.appendChild(alertDiv);
  
      this.nextBottomPosition += (alertDiv.offsetHeight + 10);
  
      if (showCloseButton == true) {
        var closeButton = document.createElement("span");
        closeButton.innerHTML = "&times;"; 
        closeButton.className = "close-button";
        closeButton.onclick = function() {
          alertDiv.style.opacity = "0"; 
          setTimeout(function() {
            alertDiv.parentNode.removeChild(alertDiv); 
          }, 500); 
        };
  
        alertDiv.appendChild(closeButton);
      }
    },
    showAlertDuration: function(message, className) {
      var alertDiv = document.createElement("div");
      alertDiv.innerHTML = message;
      alertDiv.className = "alert " + className;
      alertDiv.style.bottom = this.nextBottomPosition + "px";
      document.body.appendChild(alertDiv);
  
      this.nextBottomPosition += (alertDiv.offsetHeight + 10);
  
      setTimeout(function() {
        alertDiv.style.opacity = "0"; 
        setTimeout(function() {
          alertDiv.parentNode.removeChild(alertDiv); 
        }, 500); 
      }, 5000); 
    },
  
    alert_info: function(alertMessage) {
      var alertDiv = document.createElement("div");
      var progressBar = document.createElement("div");
      var progressValue = 100;
      var progressBarInterval = setInterval(updateProgressBar, 50);
  
      alertDiv.innerHTML = alertMessage;
      alertDiv.className = "alert info";
      alertDiv.style.bottom = this.nextBottomPosition + "px";
      document.body.appendChild(alertDiv);
  
      progressBar.className = "progress-bar";
      alertDiv.appendChild(progressBar);
  
      function updateProgressBar() {
        progressValue -= 1; 
        progressBar.style.width = progressValue + "%";
  
        if (progressValue <= 0) {
          clearInterval(progressBarInterval);
          alertDiv.style.opacity = "0"; 
          setTimeout(function() {
            alertDiv.parentNode.removeChild(alertDiv); 
          }, 500); 
        }
      }
    },
    request_holidays_alert: function(alertMessage) {
      this.showAlert(alertMessage, "request-alert",true);
    },
  
    docs_signed_alert: function(alertMessage) {
      this.showAlert(alertMessage, "docs-alert",false);
    },
  };
  

  