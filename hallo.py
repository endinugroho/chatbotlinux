from selenium import webdriver
import time
import threading
import mysql.connector
import sys
from selenium.webdriver.common.keys import Keys
# from selenium.webdriver.chrome.options import Options
from selenium.webdriver.firefox.options import Options
from selenium.webdriver.common.by import By
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.common.action_chains import ActionChains
import datetime

# from simon.accounts.pages import LoginPage
# from simon.chat.pages import ChatPage
# from simon.chats.pages import PanePage
# from simon.header.pages import HeaderPage

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="chatbotnew2",
  autocommit=True
)

mycursor = mydb.cursor()

def clearNumber(number):
  number = number.replace("+", "").strip()
  number = number.replace("-", "")
  number = number.replace("(", "")
  number = number.replace(")", "")
  number = number.replace(" ", "")
  number = number.replace("/", "")
  return number.strip()


def element_presence(by,xpath,time):
    element_present = EC.presence_of_element_located((By.XPATH, xpath))
    WebDriverWait(browser, time).until(element_present)

def send_message(receiver,message):
    element_presence(By.XPATH,'//*[@id="side"]/div[1]/div/label/div/div[2]',30)
    receiver_element = browser.find_element(By.XPATH, '//*[@id="side"]/div[1]/div/label/div/div[2]')
    receiver_element.send_keys(receiver)
    receiver_element.send_keys("\n")
    element_presence(By.XPATH,'//*[@id="main"]/footer/div[1]/div[2]/div/div[2]',30)
    msg_box = browser.find_element(By.XPATH,'//*[@id="main"]/footer/div[1]/div[2]/div/div[2]')
    # browser.execute_script("document.getElementsByClassName('_2_1wd')[1].innerText="+message)
    # msg_box.send_keys(message.replace("\r","")+"\n")
    for part in message.splitlines():
      print(part)  
      msg_box.send_keys(part+Keys.SHIFT+Keys.ENTER)
    msg_box.send_keys('\n')

def send_image(receiver,message,letakfile):
  # Thread.Sleep(Speed + 1000);
  print(letakfile)
  element_presence(By.XPATH,'//*[@id="side"]/div[1]/div/label/div/div[2]',30)
  receiver_element = browser.find_element(By.XPATH, '//*[@id="side"]/div[1]/div/label/div/div[2]')
  receiver_element.send_keys(receiver)
  receiver_element.send_keys("\n")
  time.sleep(2)
  receiver_element = browser.find_element(By.CSS_SELECTOR, "span[data-icon='clip']")
  receiver_element.click()
  time.sleep(2)
  receiver_element2 = browser.find_element(By.CSS_SELECTOR, "input[type='file']")
  receiver_element2.send_keys(letakfile)
  time.sleep(2)
  browser.execute_script("document.getElementsByClassName('_2_1wd')[0].innerText=arguments[0]",message)
  time.sleep(2)
  receiver_element3 = browser.find_element(By.CLASS_NAME, "_2_1wd")
  receiver_element3.send_keys(".")
  time.sleep(2)
  receiver_element4 = browser.find_element(By.CLASS_NAME, "_2_1wd")
  receiver_element4.send_keys(Keys.BACKSPACE)
  time.sleep(2)
  receiver_element5 = browser.find_element(By.CLASS_NAME, "_3v5V7")
  receiver_element5.click()  
  time.sleep(2)
  element_presence(By.CLASS_NAME,'_1l3ap',30)
  receiver_element6 = browser.find_element(By.CLASS_NAME, "_1l3ap").displayed()
  time.sleep(2)

  # receiver_element6.
  # Driver.FindElement(By.ClassName("_3SUnz")).Displayed;
  # Driver.FindElement(By.CssSelector("span[data-icon='clip']")).Click();
  # Thread.Sleep(Speed + 1000);
  # Driver.FindElement(By.CssSelector("input[type='file']")).SendKeys(filePath);
  # Thread.Sleep(Speed + 1000);
  # try
  # {
  #     JavaScript js = new JavaScript();
  #     js.executar(Driver, "document.getElementsByClassName('_2_1wd')[0].innerText=arguments[0]", ReplaceTagText(fileMsg, name));
  # }
  # catch (Exception)
  # {
  #     throw;
  # }
  # Thread.Sleep(1000);
  # Driver.FindElement(By.ClassName("_2_1wd")).SendKeys(".");
  # Thread.Sleep(250);
  # Driver.FindElement(By.ClassName("_2_1wd")).SendKeys(Keys.Backspace);
  # Thread.Sleep(Speed + 1000);
  # Driver.FindElement(By.ClassName("_3v5V7")).Click();
  # switch (fileType.ToString())
  # {
  #     case "0":
  #     case "1":
  #     case "image":
  #     case "video":
  #         while (true)
  #         {
  #             if (!LoadingFile("_1l3ap"))
  #             {
  #                 break;
  #             }
  #         }
  #         break;

# def notsend_message(receiver,message):
#     element_presence(By.XPATH,'//*[@id="side"]/div[1]/div/label/div/div[2]',30)
#     receiver_element = browser.find_element(By.XPATH, '//*[@id="side"]/div[1]/div/label/div/div[2]')
#     receiver_element.send_keys(receiver)
#     receiver_element.send_keys("\n")
#     element_presence(By.XPATH,'//*[@id="main"]/footer/div[1]/div[2]/div/div[2]',30)
#     msg_box = browser.find_element(By.XPATH,'//*[@id="main"]/footer/div[1]/div[2]/div/div[2]')
#     msg_box.send_keys(message)
#     msg_box.send_keys('\n')

def message1(nomor,message):
  print("SELECT * FROM customer WHERE number='"+nomor+"' AND idaplikasi="+str(parameter[0]))
  # mycursor = mydb.cursor()
  mycursor.execute("SELECT * FROM customer WHERE number='"+nomor+"' AND idaplikasi="+str(parameter[0]))
  rstCustomer = mycursor.fetchall()
  mycursor.close
  mydb.commit
  print(str(rstCustomer))
  print("hasil"+str(len(rstCustomer)))
  if (len(rstCustomer)!=0): #tidak ada record
    print("hallo")
    # send_message(nomor,"terima kasih")
    if (rstCustomer[0][1]!=""): #nama
      print("masuk ada nama")
      # SELECT * FROM menu WHERE command = @command AND idaplikasi="+idaplikasi
      sql3 = "SELECT * FROM menu WHERE command = '"+message+"' AND idaplikasi="+str(parameter[0])
      print(sql3)
      mycursor.execute(sql3)
      rstMenuCommand = mycursor.fetchall()
      mycursor.close
      mydb.commit
      print(str(rstMenuCommand))
      if len(rstMenuCommand)>0:
        # INSERT into transaksi(idcustomer,tanggaljam,message,idaplikasi) VALUES (@idcustomer,@tanggaljam,@message,@idaplikasi)
        if rstMenuCommand[0][7]==0: #isjawaban==0:
          print("isjawaban="+str(rstMenuCommand[0][7]))
          sql2 = "SELECT * FROM menu WHERE idparent=" + str(rstMenuCommand[0][0]) + " AND idaplikasi="+str(parameter[0])
          print(sql2)
          mycursor.execute(sql2)
          rstMenuParent = mycursor.fetchall()
          # print(str(rstMenu))
          mycursor.close
          mydb.commit
          print("3")  
          kirim="*"+rstMenuCommand[0][4]+" "+rstMenuCommand[0][1]+ "*\n"
          for item in rstMenuParent:
            print(item[1])
            print(item[4])
            kirim = kirim +"*"+ item[4] + "* " + item[1] + "\n"
          kirim = kirim +"\nKetik *0* untuk kembali ke menu utama"
          print(kirim)
          send_message(nomor,kirim)
          # SELECT * FROM menu WHERE idparent=" + idparent + " AND idaplikasi="+idaplikasi
          # string kirim = "*"+menuku2.command+". "+menuku2.pertanyaan+"*\n Silakan tulis nomor/angka pilihan informasi yang anda perlukan :\n";
          # foreach (var item in menuku3)
          # {
          #     kirim = kirim +"*"+ item.command + "* " + item.pertanyaan + "\n";
          # }
          # _core.ReplyMessage(kirim, msg.customer);
        else:
          print("2")  
          kirim = rstMenuCommand[0][2]+ "\n";
          if len(rstMenuCommand[0][3])>0:
            # send_file(nomor,)
            print(imagefolder+rstMenuCommand[0][3])
            send_image(nomor,kirim,imagefolder+rstMenuCommand[0][3])
            browser.execute_script("document.getElementsByClassName('sender')[0].click();");
            print("image sender on development")
          else:
            kirim2="*"+rstMenuCommand[0][4]+" "+rstMenuCommand[0][1]+ "*\n"
            kirim2 = kirim2+kirim + "Ketik *0* untuk kembali ke menu utama";
            print(kirim2)
            send_message(nomor,kirim2);

          # if (menuku2.jawabangambar.Length > 0)
          # {
          #     _core.SendFile("image", imagefolder+ menuku2.jawabangambar, menuku2.jawabantext, msg.customer);
          # }
          # else
          # {
          #   kirim += "Ketik MENU untuk kembali ke menu utama";
          #   _core.ReplyMessage(kirim, msg.customer);
          # }
          # cnn.Query(@"INSERT INTO kritiksaran(idcustomer,isi,dibaca) VALUES(" + idcustomer + ",'" + isi + "',0)");
      else:
        print("masuk siniiiiiiiiiiiiii")
        # print(message.substring(3))  
        if (message[0:3].upper()=="KS#"):
          # INSERT INTO kritiksaran(idcustomer,isi,dibaca) VALUES(" + idcustomer + ",'" + isi + "',0)
          sql = "INSERT INTO kritiksaran(idcustomer,isi,dibaca) VALUES(%s,%s,%s);"
          # print(lokasi.get_property("innerText"))
          val = (rstCustomer[0][0],message[3:],0)
          print("simpan detail customer")
          mycursor.execute(sql, val)
          mydb.commit()
          send_message(nomor,"Terima kasih atas kritik dan saran yang diberikan demi peningkatan pelayanan kami")
        else:
          sql2 = "SELECT * FROM menu WHERE idparent=0 AND idaplikasi="+str(parameter[0])
          print(sql2)
          mycursor.execute(sql2)
          rstMenu = mycursor.fetchall()
          # print(str(rstMenu))
          mycursor.close
          mydb.commit
          print("luha")
          print("customerid="+rstCustomer[0][1])      
          kirim = rstCustomer[0][1] + ",\n\r" + "Saat ini anda terhubung dengan  " + diskripsi + " " + namaapp + " \n\rSilakan tulis nomor/angka sesuai jenis pilihan informasi yang anda perlukan :\n"
          print(kirim)
          for item in rstMenu:
            print(item[1])
            kirim = kirim +"*"+ item[4] + "* " + item[1] + "\n"
          send_message(nomor,kirim)


    else:
    # jika y maka update dari temp ke nama kemudian reply cus.name_temp + ",\n\r" + "Saat ini anda terhubung dengan  " + deskripsi + " " + namaapp + " \n\rSilakan tulis nomor/angka pilihan informasi yang anda perlukan :\n" dan list menu

    # jika t maka  "Silakan masukkan nama"

    # jika yang lain maka Konfirm nama anda adalah .... tekan y dan tekan t
# [(95, 'endi', 'endi_temp', '+62 812-3358-5590', '2021-05-10 04:34:31.692749', '2021-05-10 
      print("masuk tidak ada nama")
      print(rstCustomer[0][2])
      print(rstCustomer[0][0])
      print(message)
      if (message=="Y") or (message=="y"):
        sql = "UPDATE customer SET name = '"+rstCustomer[0][2]+"', name_temp = '' WHERE id = " + str(rstCustomer[0][0]) 
        print(sql)
        mycursor.execute(sql)
        mydb.commit()

        kirim = rstCustomer[0][2] + ",\n\r" + "Saat ini anda terhubung dengan  " + diskripsi + " " + namaapp + " \n\rSilakan tulis nomor/angka sesuai jenis pilihan informasi yang anda perlukan :\n"
        sql2 = "SELECT * FROM menu WHERE idparent=0 AND idaplikasi="+str(parameter[0])
        mycursor.execute(sql2)
        rstMenu = mycursor.fetchall()
        mycursor.close
        mydb.commit
              
        # string kirim = cus.name_temp + ",\n\r" + "Saat ini anda terhubung dengan  " + deskripsi + " " + namaapp + " \n\rSilakan tulis nomor/angka pilihan informasi yang anda perlukan :\n";
        print(str(rstMenu))
        for item in rstMenu:
          print(item[1])
          kirim = kirim +"*"+ item[4] + "* " + item[1] + "\n"
        send_message(nomor,kirim)
      elif (message=="T") or (message=="t"):
        print("T")
        send_message(nomor,"Tuliskan *NAMA* anda untuk registrasi")
      else:
        # UPDATE customer SET name_temp='" + name + "' WHERE number = '" + number + "' and idaplikasi = " + idaplikasi
        # print("default") 
        sql = "UPDATE customer SET name_temp='" + message + "' WHERE number = '" + nomor + "' and idaplikasi ="+str(parameter[0]) 
        mycursor.execute(sql)
        mydb.commit()
        send_message(nomor,"Apa benar nama anda adalah *"+message+"*?\r\n\r\n"+"Ketik *Y* untuk Ya\r\n"+"Ketik *T* untuk Tidak")

  else:
    send_message(nomor,"Selamat datang,\n\rTerima kasih telah menghubungi "+namaapp+ "\n\rSilakan tulis nama lengkap anda sesuai kartu identitas yang berlaku")
    sql = "INSERT INTO customer(name,number,ktp,create_date,update_date,idaplikasi ) VALUES (%s,%s,%s,%s,%s,%s);"
    # print(lokasi.get_property("innerText"))
    val = ('',nomor,'',datetime.datetime.now(),datetime.datetime.now(),str(parameter[0]))
    print("simpan detail customer")
    mycursor.execute(sql, val)
    mydb.commit()

def printit():
  a=1
  b=1
  # browser.execute_script("document.getElementsByClassName('sender')[0].click();");
  # time.sleep(3)
  action = webdriver.ActionChains(browser)
  # elemenku = browser.find_element_by_class_name("EBaI7 _23e-h")
  # action.move_by_offset(300,300)
  # action.perform()
  # element = driver.find_element_by_id('your-id') # or your another selector here
  while True:
    # a=a+10

    # action.move_by_offset
    action.move_to_element_with_offset(browser.find_element_by_tag_name('body'), 300,300)
    action.move_by_offset(a,b)
    action.perform()
    print("a="+str(a))
    if a==1:
      a=-1
      b=-1
    else:
      a=1
      b=1
    
    print("Hello, World!")
    try:
      element_presence(By.XPATH,"//div[@class='_2Z4DV _1V5O7']",30)
      unread1 = browser.find_elements(By.XPATH, "//div[@class='_2Z4DV _1V5O7']")
      # unread1 = browser.find_elements_by_xpath("//div[@class='_2Z4DV _1V5O7']")
      # unread1 = browser.find_elements_by_class_name("_2Z4DV _1V5O7")

      for item in unread1:
        print(item.get_property("innerText"))
        messageku=item.get_property("innerText").splitlines()
        print(str(messageku))
        item.click()
        browser.execute_script("document.getElementsByClassName('sender')[0].click();");
        time.sleep(10)
        print(messageku[0])
        print(messageku[2])
        message1(messageku[0],messageku[2])
        browser.execute_script("document.getElementsByClassName('sender')[0].click();");
        time.sleep(10)
    except:
      pass
  # threading.Timer(15.0, printit).start()

# prepare the option for the chrome driver

# opt = webdriver.ChromeOptions()
# opt.add_argument("--headless")
# opt.add_argument("--disable-xss-auditor")
# opt.add_argument("--disable-web-security")
# opt.add_argument("--allow-running-insecure-content")
# opt.add_argument("--no-sandbox")
# opt.add_argument("--disable-setuid-sandbox")
# opt.add_argument("--disable-webgl")
# opt.add_argument("--disable-popup-blocking")
# start chrome browser

# options = Options()
# options.headless = True
# browser = webdriver.Firefox(options=options)
browser = webdriver.Firefox()


parameter=sys.argv[1:]
mycursor.execute("SELECT * FROM aplikasi WHERE id="+str(parameter[0]))
rstInfo = mycursor.fetchall()
print(str(rstInfo))
namaapp = rstInfo[0][1]
diskripsi = rstInfo[0][2]
imagefolder = rstInfo[0][5]
print(namaapp+" "+diskripsi+" "+imagefolder)
# SELECT * FROM aplikasi WHERE id= @id
# browser = webdriver.Chrome()
browser.get('https://web.whatsapp.com/')
browser.execute_script("var a = document.createElement('a');var linkText = document.createTextNode('my title text');a.appendChild(linkText);a.className = 'sender';a.title = 'my title text';a.href = 'https://wa.me/555481512349';document.body.appendChild(a);")
print(browser.current_url)
time.sleep(2)
browser.save_screenshot("qrcode.png")
time.sleep(10)
printit()
# browser.quit()