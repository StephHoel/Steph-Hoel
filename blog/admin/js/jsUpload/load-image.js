
(function($){'use strict';var loadImage=function(file,callback,options){var img=document.createElement('img'),url,oUrl;img.onerror=callback;img.onload=function(){if(oUrl&&!(options&&options.noRevoke)){loadImage.revokeObjectURL(oUrl);}
if(callback){callback(loadImage.scale(img,options));}};if(loadImage.isInstanceOf('Blob',file)||loadImage.isInstanceOf('File',file)){url=oUrl=loadImage.createObjectURL(file);img._type=file.type;}else if(typeof file==='string'){url=file;if(options&&options.crossOrigin){img.crossOrigin=options.crossOrigin;}}else{return false;}
if(url){img.src=url;return img;}
return loadImage.readFile(file,function(e){var target=e.target;if(target&&target.result){img.src=target.result;}else{if(callback){callback(e);}}});},urlAPI=(window.createObjectURL&&window)||(window.URL&&URL.revokeObjectURL&&URL)||(window.webkitURL&&webkitURL);loadImage.isInstanceOf=function(type,obj){return Object.prototype.toString.call(obj)==='[object '+type+']';};loadImage.transformCoordinates=function(canvas,orientation){var ctx=canvas.getContext('2d'),width=canvas.width,height=canvas.height;if(orientation>4){canvas.width=height;canvas.height=width;}
switch(orientation){case 2:ctx.translate(width,0);ctx.scale(-1,1);break;case 3:ctx.translate(width,height);ctx.rotate(Math.PI);break;case 4:ctx.translate(0,height);ctx.scale(1,-1);break;case 5:ctx.rotate(0.5*Math.PI);ctx.scale(1,-1);break;case 6:ctx.rotate(0.5*Math.PI);ctx.translate(0,-height);break;case 7:ctx.rotate(0.5*Math.PI);ctx.translate(width,-height);ctx.scale(-1,1);break;case 8:ctx.rotate(-0.5*Math.PI);ctx.translate(-width,0);break;}};loadImage.detectSubsampling=function(img){var canvas,context;if(img.width*img.height>1024*1024){canvas=document.createElement('canvas');canvas.width=canvas.height=1;context=canvas.getContext('2d');context.drawImage(img,-img.width+1,0);return context.getImageData(0,0,1,1).data[3]===0;}
return false;};loadImage.detectVerticalSquash=function(img,correctedHeight){var canvas=document.createElement('canvas'),context=canvas.getContext('2d'),data,sy,ey,py,alpha;canvas.width=1;canvas.height=correctedHeight;context.drawImage(img,0,0);data=context.getImageData(0,0,1,correctedHeight).data;sy=0;ey=correctedHeight;py=correctedHeight;while(py>sy){alpha=data[(py-1)*4+3];if(alpha===0){ey=py;}else{sy=py;}
py=(ey+sy)>>1;}
return(py/correctedHeight)||1;};loadImage.renderImageToCanvas=function(canvas,img,sourceX,sourceY,sourceWidth,sourceHeight,destX,destY,destWidth,destHeight){var context=canvas.getContext('2d'),tmpCanvas=document.createElement('canvas'),tileSize=tmpCanvas.width=tmpCanvas.height=1024,tmpContext=tmpCanvas.getContext('2d'),vertSquashRatio,tileX,tileY;context.save();if(loadImage.detectSubsampling(img)){sourceWidth/=2;sourceHeight/=2;}
vertSquashRatio=loadImage.detectVerticalSquash(img,sourceHeight);destWidth=Math.ceil(tileSize*destWidth/sourceWidth);destHeight=Math.ceil(tileSize*destHeight/sourceHeight/vertSquashRatio);destY=0;tileY=0;while(tileY<sourceHeight){destX=0;tileX=0;while(tileX<sourceWidth){tmpContext.clearRect(0,0,tileSize,tileSize);tmpContext.drawImage(img,sourceX,sourceY,sourceWidth,sourceHeight,-tileX,-tileY,sourceWidth,sourceHeight);context.drawImage(tmpCanvas,0,0,tileSize,tileSize,destX,destY,destWidth,destHeight);tileX+=tileSize;destX+=destWidth;}
tileY+=tileSize;destY+=destHeight;}
context.restore();};loadImage.scale=function(img,options){options=options||{};var canvas=document.createElement('canvas'),useCanvas=img.getContext||((options.canvas||options.crop||options.orientation)&&canvas.getContext),width=img.width,height=img.height,sourceWidth=width,sourceHeight=height,sourceX=0,sourceY=0,destX=0,destY=0,maxWidth,maxHeight,minWidth,minHeight,destWidth,destHeight,scale;if(useCanvas&&options.orientation>4){maxWidth=options.maxHeight;maxHeight=options.maxWidth;minWidth=options.minHeight;minHeight=options.minWidth;}else{maxWidth=options.maxWidth;maxHeight=options.maxHeight;minWidth=options.minWidth;minHeight=options.minHeight;}
if(useCanvas&&maxWidth&&maxHeight&&options.crop){destWidth=maxWidth;destHeight=maxHeight;if(width/height<maxWidth/maxHeight){sourceHeight=maxHeight*width/maxWidth;sourceY=(height-sourceHeight)/2;}else{sourceWidth=maxWidth*height/maxHeight;sourceX=(width-sourceWidth)/2;}}else{destWidth=width;destHeight=height;scale=Math.max((minWidth||destWidth)/destWidth,(minHeight||destHeight)/destHeight);if(scale>1){destWidth=Math.ceil(destWidth*scale);destHeight=Math.ceil(destHeight*scale);}
scale=Math.min((maxWidth||destWidth)/destWidth,(maxHeight||destHeight)/destHeight);if(scale<1){destWidth=Math.ceil(destWidth*scale);destHeight=Math.ceil(destHeight*scale);}}
if(useCanvas){canvas.width=destWidth;canvas.height=destHeight;loadImage.transformCoordinates(canvas,options.orientation);if(img._type==='image/jpeg'){loadImage.renderImageToCanvas(canvas,img,sourceX,sourceY,sourceWidth,sourceHeight,destX,destY,destWidth,destHeight);}else{canvas.getContext('2d').drawImage(img,sourceX,sourceY,sourceWidth,sourceHeight,destX,destY,destWidth,destHeight);}
return canvas;}
img.width=destWidth;img.height=destHeight;return img;};loadImage.createObjectURL=function(file){return urlAPI?urlAPI.createObjectURL(file):false;};loadImage.revokeObjectURL=function(url){return urlAPI?urlAPI.revokeObjectURL(url):false;};loadImage.readFile=function(file,callback,method){if(window.FileReader&&FileReader.prototype.readAsDataURL){var fileReader=new FileReader();fileReader.onload=fileReader.onerror=callback;method=method||'readAsDataURL';if(!fileReader[method]){return false;}
fileReader[method](file);return fileReader;}
return false;};if(typeof define==='function'&&define.amd){define(function(){return loadImage;});}else{$.loadImage=loadImage;}}(this));