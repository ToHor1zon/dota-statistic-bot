import os

from fastapi import FastAPI, Request
from fastapi.responses import JSONResponse
from html2image import Html2Image


app = FastAPI()

@app.api_route("/get_html/", methods=['POST'])
async def get_html(request: Request):
    body = await request.json()
    html = body.get('html')
    name = body.get('name')
    hti = Html2Image(output_path=os.getcwd() + '/media/generated_images', custom_flags=['--no-sandbox'])
    hti.screenshot(html_str=html, save_as=f'{name}.png')
    return JSONResponse({})

if __name__ == "__main__":
    import uvicorn
    uvicorn.run('main:app', host="0.0.0.0", port=8090, loop="asyncio", reload=True)
