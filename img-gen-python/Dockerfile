FROM python:3.11.5

WORKDIR /app

COPY requirements.txt .

RUN pip install --no-cache-dir -r requirements.txt

COPY . .

EXPOSE 8090

CMD ["python3", "main.py"]
