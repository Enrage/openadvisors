import axios from 'axios';

document.addEventListener("DOMContentLoaded", function() {
  function timeNow() {
    let date = new Date();
    let day = date.getDate();
    if (day < 10) day = '0' + day;
    let month = date.getMonth() + 1;
    if (month < 10) month = '0' + month;
    let year = date.getFullYear();
    let hour = date.getHours();
    if (hour < 10) hour = '0' + hour;
    let minutes = date.getMinutes();
    if (minutes < 10) minutes = '0' + minutes;
    let seconds = date.getSeconds();
    if (seconds < 10) seconds = '0' + seconds;

    let timeStart = `${day}.${month}.${year} ${hour}:${minutes}:${seconds}`;
    return timeStart;
  }

  let topMenuBtn = document.querySelector('.top_menu_btn');
  let topMenu = document.querySelector('.top_menu_list');
  if (topMenuBtn) {
    topMenuBtn.onclick = function(e) {
      e.preventDefault();
      console.log(e);
      // console.log(topMenu.style);
      if (topMenu.style.display != 'flex') {
        topMenu.style.display = 'flex';
        // topMenu.classList.add('b-show');
        // topMenu.classList.remove('b-hidden');
      } else {
        topMenu.style.display = 'none';
        // topMenu.classList.add('b-hidden');
        // topMenu.classList.remove('b-show');
      }
    }
  }

  function checkName(name) {
    if (name !== '' && name.length < 100) {
      return true;
    } else {
      return false;
    }
  }

  function checkCode(code) {
    if (code !== '' && !isNaN(code) && /^[1-9][0-9]?[0-9]?$/.test(code)) {
      return true;
    } else return false;
  }

  function checkComment(comment) {
    if (comment !== '') {
      if (comment.length > 99) {
        return false;
      } else return true;
    } else return true;
  }

  // Start button
  let start = document.querySelector('.frv_start');
  let comments = [];
  // Frv first form error
  let error = document.querySelector('.error');
  // Frv second form error
  let error2 = document.querySelector('.error_2');
  // Кого нормируем
  let regulate = document.querySelector('#frv_name');
  // First form
  let startForm = document.querySelector('#first_frv_form');
  // Second form
  let secondForm = document.querySelector('#second_frv_form');
  // Result block
  let resultBlock = document.querySelector('#frv_result_block');

  if (start) {
    start.onclick = function(e) {
      e.preventDefault();
      error.classList.remove('show');
      if (checkName(regulate.value)) {
        comments.push({
          time: timeNow(),
          code: '0',
          comment: 'start'
        });
        localStorage.setItem('regulate', regulate.value);
        startForm.classList.add('b-hidden');
        startForm.classList.remove('b-show');
        secondForm.classList.add('b-show');
        secondForm.classList.remove('b-hidden');
      } else {
        regulate.classList.add('bd_error');
        error.classList.add('show');
        error.textContent = 'Заполните поле, что и кого нормируем!';
      }
    }
  }

  // Back button
  // let back = document.querySelector('.back_to_form');
  // if (back) {
  //   back.onclick = function(e) {
  //     e.preventDefault();
  //     startForm.classList.add('b-show');
  //     startForm.classList.remove('b-hidden');
  //     secondForm.classList.add('b-hidden');
  //     secondForm.classList.remove('b-show');
  //   };
  // }

  // Input comment data
  let comment = document.querySelector('#frv_comment');
  // Input code data
  let code = document.querySelector('#frv_code');

  if (regulate) {
    regulate.addEventListener('input', function() {
      this.classList.remove('bd_error');
      error.classList.remove('show');
    });
  }

  if (comment) {
    comment.addEventListener('input', function() {
      this.classList.remove('bd_error');
      code.classList.remove('bd_error');
      error2.classList.remove('show');
    });
  }

  if (code) {
    code.addEventListener('input', function(e) {
      if (!(/\d/).test(e.data)) {
        this.value = this.value.replace(/\D/gi, '');
      }
      if (this.value.length > 3) {
        this.value = this.value.substr(0, 3);
      }
      this.classList.remove('bd_error');
      comment.classList.remove('bd_error');
      error2.classList.remove('show');
    });
  }

  // Кнопка сделано
  let done = document.querySelector('.frv_done');
  if (done) {
    done.onclick = function(e) {
      e.preventDefault();
      error2.classList.remove('show');
      if (checkComment(comment.value) && checkCode(code.value)) {
        comments.push({
          time: timeNow(),
          code: code.value,
          comment: comment.value
        });
        comment.value = '';
        code.value = '';
      } else {
        if (!checkComment(comment.value)) {
          comment.classList.add('bd_error');
        }
        if (!checkCode(code.value)) {
          code.classList.add('bd_error');
        }
        error2.classList.add('show');
        error2.textContent = 'Правильно заполните поля!';
      }
    }
  }

  // Finish button
  let finish = document.querySelector('.frv_finish');
  if (finish) {
    finish.onclick = function(e) {
      e.preventDefault();
      error2.classList.remove('show');
      if (checkComment(comment.value) && checkCode(code.value)) {
        comments.push({
          time: timeNow(),
          code: code.value,
          comment: comment.value
        });
        comment.value = '';
        code.value = '';
        let operations = JSON.stringify(comments);

        let headers = {
          'Content-Type': 'application/json'
        };

        axios.post('/api/operation_save', {
          regulate: localStorage.getItem('regulate'),
          operations: operations
        }, headers).then(response => {
          localStorage.removeItem('regulate');
          console.log(response);
          secondForm.classList.add('b-hidden');
          secondForm.classList.remove('b-show');

          resultBlock.classList.add('b-show');
          resultBlock.classList.remove('b-hidden');
          let frvResult = document.querySelector('.frv_result_text');
          frvResult.innerHTML = `В течение 10 минут на Вышу почту <span class="bold">${response.data}</span> будет отправлена таблица с результатами нормирования!`;
        });
      } else {
        if (!checkComment(comment.value)) {
          comment.classList.add('bd_error');
        }
        if (!checkCode(code.value)) {
          code.classList.add('bd_error');
        }
        error2.classList.add('show');
        error2.textContent = 'Правильно заполните поля!';
      }
    }
  }

  let oneMoreBtn = document.querySelector('.frv_one_more');
  let toAccountBtn = document.querySelector('.frv_to_account');

  if (oneMoreBtn) {
    oneMoreBtn.onclick = function(e) {
      e.preventDefault();
      document.location.href = '/profile/frv_prof';
    }
  }

  if (toAccountBtn) {
    toAccountBtn.onclick = function(e) {
      e.preventDefault();
      document.location.href = '/profile';
    }
  }

  // Выйти из программы
  let logout = document.querySelector('.frv_logout_btn');
  if (logout) {
    logout.onclick = function(e) {
      e.preventDefault();
      localStorage.removeItem('regulate');
      document.location.href = '/';
    }
  }

  // Модальное окно с инструкцией
  let modal = document.querySelector('.modal');
  let wrapper = document.querySelector('#wrapper');
  let manual = document.querySelector('.frv_manual_btn');
  let cancel = document.querySelector('.modal_cancel');
  if (manual) {
    manual.onclick = function(e) {
      e.preventDefault();
      modal.classList.add('b-show');
      wrapper.classList.add('blur');
    }
    if (cancel) {
      cancel.onclick = function(e) {
        e.preventDefault();
        modal.classList.remove('b-show');
        wrapper.classList.remove('blur');
      }
    }
  }

  // Показать описание программы ФРВ-проф
  let frv = document.querySelector('.img_frv');
  let about = document.querySelector('.about_frv');
  if (frv) {
    frv.onclick = function(e) {
      e.preventDefault();
      if (!about.classList.contains('b-show')) {
        about.classList.remove('b-hidden');
        about.classList.add('b-show');
      } else {
        about.classList.remove('b-show');
        about.classList.add('b-hidden');
      }
    }
  }

  // Подсвечивает активный пункт верхнего меню
  let pathName = document.location.pathname;
  let link = document.querySelector('a[href="' + pathName + '"]');
  if (link) {
    let active = document.querySelector('li.active');
    if (active) {
      active.classList.remove('active');
    }
    link.parentNode.classList.add('active');
    link.parentNode.parentNode.parentNode.classList.add('active');
  }

  // Валидация полей настроек профиля
  let Valid = new Validator();

  let index = document.querySelector('#index');

  let phone = document.querySelector('#phone');
  let updateProfile = document.querySelector('#save_profile');
  if (updateProfile) {
    updateProfile.onclick = function() {
      error.classList.remove('show');
      if (!Valid.checkPhone(phone.value)) {
        phone.classList.add('bd_error');
        error.classList.add('show');
        return false;
      }

      if (!Valid.checkIndex(index.value)) {
        index.classList.add('bd_error');
        error.classList.add('show');
        return false;
      }
    }
  }
});

class Validator {

  checkIndex(index) {
    if (index.length > 0) {
      if (index.length > 4 && /^[-]?\d+$/.test(index)) {
        return true;
      } else return false;
    }
    return true;
  }

  checkPhone(phone) {
    if (phone.length > 0) {
      if (/^(\+)?\d+$/.test(phone)) return true;
      else return false;
    }
    return true;
  }
}

// window.onload = function () {


// };