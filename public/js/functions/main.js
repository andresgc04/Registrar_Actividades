function getUrlParameter(Param) {
  var pageURl = decodeURIComponent(window.location.search.substring(1)),
    urlVariables = pageURl.split("&"),
    parameterName,
    i;

  for (i = 0; i < urlVariables.length; i++) {
    parameterName = urlVariables[i].split("=");

    if (parameterName[0] === Param) {
      return parameterName[1] === undefined ? true : parameterName[1];
    }
  }
}
