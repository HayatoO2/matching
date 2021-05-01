window.addEventListener('load',fav );

function fav(){
  const to_btn = document.getElementById('to_btn');
  const from_btn = document.getElementById('from_btn');
  const both_btn = document.getElementById('both_btn');
  const to_fav = document.getElementById('to_fav');
  const from_fav = document.getElementById('from_fav');
  const both_fav = document.getElementById('both_fav');

  to_btn.addEventListener('click', () => {
    to_fav.classList.remove('d-none');
    from_fav.classList.add('d-none');
    both_fav.classList.add('d-none');
  });
  from_btn.addEventListener('click', () => {
    to_fav.classList.add('d-none');
    from_fav.classList.remove('d-none');
    both_fav.classList.add('d-none');
  });
  both_btn.addEventListener('click', () => {
    to_fav.classList.add('d-none');
    from_fav.classList.add('d-none');
    both_fav.classList.remove('d-none');
  });
}

