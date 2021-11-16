const reviews = [
  {
    id: 1,
    name: "Joan G. Haahr",
    job: "critic",
    img:
      "../images/review1.jpg",
    text:
      "Povestea este neobișnuită printre poveștile timpurii ale lui Andersen, atât prin accentul pus pe dorința senzuală, cât și în ambiguitățile sale. Soarta oarbă, nu intenția, determină toate evenimentele. Mai mult, întrebările narative Acceptarea pasivă a soldatului de tablă a oricărui lucru care i se întâmplă, în timp ce exemplifică idealuri pietiste de tăgăduire de sine, contribuie, de asemenea, la pierderea sa. Dacă ar vorbi și acționa, soldatul ar putea câștiga atât viața, cât și dragostea. cu toate acestea, prin inhibiție și convenție, el găsește doar tragedie și moarte. Povestea este adesea citită autobiografic, soldatul fiind văzut ca simbolizând sentimentele de inadecvare ale lui Andersen față de femei, acceptarea pasivă a atitudinilor burgheze de clasă sau sentimentul său de alienare ca artist. și un străin, de la participarea deplină la viața de zi cu zi.",
  },
  {
    id: 2,
    name: "Karel Husa",
    job: "compozitor",
    img:
      "../images/review2.jpg",
    text:
      "Poveștile lui mi s-au părut întotdeauna cele mai frumoase și poetice, dar și triste, uneori chiar crude, întrucât tratează toate subiectele vieții, precum și moartea. La fel ca în multe dintre povestirile sale celebre, și în Soldățelul de plumb, simbolul iubirii rămâne motivul principal.",
  },
  {
    id: 3,
    name: "Mari Ness",
    job: "autor",
    img:
      "../images/review3.jpg",
    text:
      "În cea mai mare parte, aceasta mi se pare o poveste scrisă de cineva care câștigă mai multă încredere în creația sa, o încredere care i-a permis să scrie o poveste cu un protagonist complet mut și pasiv — un protagonist care poate doar să gândească, nu să facă. O poveste care funcționează ca experiment literar și basm. Poate că nu este una dintre poveștile cele mai vesele ale lui Andersen, dar pentru toate neplăcerile și întrebările mele, poate fi una dintre cele mai de succes ale lui.",
  },
];

const img = document.getElementById("person-img");
const author = document.getElementById("author");
const job = document.getElementById("job");
const info = document.getElementById("review-info");

const prevBtn = document.querySelector(".prev-btn");
const nextBtn = document.querySelector(".next-btn");
const randomBtn = document.querySelector(".random-btn");


let currentItem = 0;


window.addEventListener("DOMContentLoaded", function () {
  const item = reviews[currentItem];
  img.src = item.img;
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;
});


function showPerson(person) {
  const item = reviews[person];
  img.src = item.img;
  author.textContent = item.name;
  job.textContent = item.job;
  info.textContent = item.text;
}

nextBtn.addEventListener("click", function () {
  currentItem++;
  if (currentItem > reviews.length - 1) {
    currentItem = 0;
  }
  showPerson(currentItem);
});

prevBtn.addEventListener("click", function () {
  currentItem--;
  if (currentItem < 0) {
    currentItem = reviews.length - 1;
  }
  showPerson(currentItem);
});