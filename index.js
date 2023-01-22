const s = (el) => document.querySelector(el);

const dateDifference = s("#date-difference");
const createDatabase = s("#create-database");
const listPaginateUsers = s("#list-paginate-users");
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
  let host = s(["input[name='host']"]).value;
  let user = s(["input[name='user']"]).value;
  let port = s(["input[name='port']"]).value;
  const password = s(["input[name='password']"]).value;
  const user_id = s(["input[name='user_id']"]).value;

  event.preventDefault();
  if (!user_id) {
    s(["input[name='user_id']"]).focus();
    s(".fill-user-id").style.display = "flex";
    return;
  }
  host = host ? host : "127.0.0.1";
  port = port ? port : "3306";
  user = user ? user : "root";

  location.href = "controller.php?challenge=3&host=" + host + "&port=" + port + "&user=" + user + "&password=" + password + "&user_id=" + user_id;
})

listPaginateUsers.addEventListener('click', function (event) {
  let host = s(["input[name='host']"]).value;
  let user = s(["input[name='user']"]).value;
  let port = s(["input[name='port']"]).value;
  const password = s(["input[name='password']"]).value;
  let page = s(["input[name='page']"]).value;

  host = host ? host : "127.0.0.1";
  port = port ? port : "3306";
  user = user ? user : "root";
  page = page ? page : 1;

  event.preventDefault();
  location.href = "controller.php?challenge=4&host=" + host + "&port=" + port + "&user=" + user + "&password=" + password + "&p=" + page;
})
