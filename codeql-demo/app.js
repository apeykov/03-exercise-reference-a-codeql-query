const url = document.location.href;
const defaultIndex = url.indexOf("default=");

if (defaultIndex !== -1) {
  const defaultValue = url.substring(defaultIndex + 8);
  document.getElementById("result").textContent = defaultValue;
}
