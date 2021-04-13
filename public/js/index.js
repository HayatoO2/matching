window.addEventListener('load', post);

function post(){
  const search = document.getElementById('search-btn');
  const searchForm = document.getElementById('search-form');
  search.addEventListener('click',function(){
    searchForm.classList.toggle('d-none');
  });
}