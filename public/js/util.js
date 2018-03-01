function capitalizeFirstLetter(string) {
    return string.charAt(0).toUpperCase() + string.slice(1);
}

function getRandom(min, max) {
    return Math.round(Math.random() * (max - min) + min);
  }