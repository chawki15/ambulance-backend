const menuBtn = document.getElementById('menuBtn');
const sidebar = document.getElementById('sidebar');
menuBtn.addEventListener('click', () => sidebar.classList.toggle('open'));

document.addEventListener('click', (e) => {
  if (window.innerWidth <= 820 && !sidebar.contains(e.target) && !menuBtn.contains(e.target)) {
    sidebar.classList.remove('open');
  }
});

const canvas = document.getElementById('movementChart');
const ctx = canvas.getContext('2d');
const data = [25, 42, 25, 44, 24, 43, 18];
const labels = ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'];

function drawChart() {

  const ratio = window.devicePixelRatio || 1;

  const width = canvas.parentElement.clientWidth - 40;
  const height = 180;

  canvas.width = width * ratio;
  canvas.height = height * ratio;

  canvas.style.width = width + "px";
  canvas.style.height = height + "px";

  ctx.setTransform(1, 0, 0, 1, 0, 0);
  ctx.scale(ratio, ratio);

  const pad = 35;

  ctx.clearRect(0, 0, width, height);

  ctx.strokeStyle = '#e7eef8';
  ctx.lineWidth = 1;

  for(let i=0;i<5;i++){
      const y = pad + i*(height-pad*1.7)/4;
      ctx.beginPath();
      ctx.moveTo(pad,y);
      ctx.lineTo(width-10,y);
      ctx.stroke();
  }

  const max = 60;

  const points = data.map((v,i)=>({
      x:pad+i*((width-pad-15)/(data.length-1)),
      y:height-pad-(v/max)*(height-pad*1.8)
  }));

  const grad = ctx.createLinearGradient(0,40,0,height);
  grad.addColorStop(0,'rgba(226,13,33,.28)');
  grad.addColorStop(1,'rgba(226,13,33,0)');

  ctx.beginPath();
  points.forEach((p,i)=> i ? ctx.lineTo(p.x,p.y) : ctx.moveTo(p.x,p.y));
  ctx.lineTo(points[points.length-1].x,height-pad);
  ctx.lineTo(points[0].x,height-pad);
  ctx.closePath();

  ctx.fillStyle = grad;
  ctx.fill();

  ctx.beginPath();
  points.forEach((p,i)=> i ? ctx.lineTo(p.x,p.y) : ctx.moveTo(p.x,p.y));

  ctx.strokeStyle='#e20d21';
  ctx.lineWidth=3;
  ctx.stroke();

  ctx.fillStyle='#50658b';
  ctx.font='12px Inter';

  labels.forEach((l,i)=>{
      ctx.fillText(l, points[i].x - 10, height - 8);
  });
}
window.addEventListener('resize', drawChart); drawChart();
