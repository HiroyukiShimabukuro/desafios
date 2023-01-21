const s = (el) => document.querySelector(el);

const dateDifference = s("#date-difference");
const createDatabase = s("#create-database");
dateDifference.addEventListener('click', function (event) {
  let date = s(["input[name='date']"]).value;
  if (!date) return;
  //tratando a data para passar no formato BR ("dd/mm/YYYY")
  date = date.replaceAll('-', '/');
  let dateToFormat = new Date(date);
  let monthBR = (dateToFormat.getMonth() + 1).toString().padStart(2, "0");
  let dayBR = dateToFormat.getDate().toString().padStart(2, "0");
  let dateBR = dayBR + '/' + monthBR + '/' + dateToFormat.getFullYear();

  event.preventDefault();
  location.href = "controller.php?challenge=2&date=" + dateBR;
})

createDatabase.addEventListener('click', function (event) {
  const host = s(["input[name='host']"]).value;
  const user = s(["input[name='user']"]).value;
  const password = s(["input[name='password']"]).value;

  event.preventDefault();
  location.href = "controller.php?challenge=3&host=" + host + "&user=" + user + "&password=" + password;
})