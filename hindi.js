const video = document.getElementById('video')
face=['M1.mp3', 'M2.mp3'];

Promise.all([
  faceapi.nets.tinyFaceDetector.loadFromUri('/models'),
  faceapi.nets.faceLandmark68Net.loadFromUri('/models'),
  faceapi.nets.faceRecognitionNet.loadFromUri('/models'),
  faceapi.nets.faceExpressionNet.loadFromUri('/models')
]).then(startVideo)

function startVideo() {
  navigator.getUserMedia(
    { video: {} },
    stream => video.srcObject = stream,
    err => console.error(err)
  )
}

var counter = 0;

let startdetection=0;
video.addEventListener('play', () => {
  if(counter==100)
  return
  const canvas = faceapi.createCanvasFromMedia(video)
  document.body.append(canvas)
  const displaySize = { width: video.width, height: video.height }
  faceapi.matchDimensions(canvas, displaySize)
  setInterval(async () => {
    const detections = await faceapi.detectAllFaces(video, new faceapi.TinyFaceDetectorOptions()).withFaceLandmarks().withFaceExpressions()
    const resizedDetections = faceapi.resizeResults(detections, displaySize)
    canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height)
    faceapi.draw.drawDetections(canvas, resizedDetections)
    faceapi.draw.drawFaceLandmarks(canvas, resizedDetections)
    faceapi.draw.drawFaceExpressions(canvas, resizedDetections)
    try {
      console.log(detections[0].expressions)
      let x = detections[0].expressions;
      console.log(x.happy,x.neutral,x.angry,x.sad)
      startdetection = detections[0].expressions;
    
      
    } catch (error) {
      console.log('');
    }
    try {
      // let x = detections[0].expressions;
      // if(x.neutral>=0.9876754355666 ){
      //   var p1 = new Audio("M1.mp3");
      //   p1.play();
      //  }


      
    } catch (error) {
   
    }
    
  
  },100)
  


      
});

document.getElementById("demo").addEventListener("click",display)
function display(){
  // let x = detections[0].expressions;
  if(startdetection.neutral>=0.987675435566){

    window.open("https://music.youtube.com/playlist?list=PLFFyMei_d85XB2mHMxHSC2RDOhyOlsvXq")
}
else if(startdetection.happy>=0.97776736637467){
 window.open(" https://music.youtube.com/playlist?list=RDCLAK5uy_n9Fbdw7e6ap-98_A-8JYBmPv64v-Uaq1g")
 }
 else if(startdetection.angry>=0.97776736656467){
    window.open("https://music.youtube.com/playlist?list=PLxNm0dqHxmlupV3dr7uq4Rl8L5nwlGKQA ")
} 

 else if(startdetection.sad>=0.97776736658736847){
    window.open("https://music.youtube.com/playlist?list=PLjNto8TPVbVpQTRvQ7tOPDkuG_fcE1VwI ")
} 
    function pause1(){
       p2=document.getElementById("pause").addEventListener("click",display)
      p2.pause();


    }
    console.log('button pressed')



    
  console.log('button pressed');
}
