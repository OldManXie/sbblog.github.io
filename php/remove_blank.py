#!/usr/bin/env python3
# coding: UTF-8
import re,os
def minify_html(filename):
    with open(filename,'r',encoding='utf-8') as p:
        with open(filename+'.tmp','w',encoding='utf-8') as t:
            while True:
                l = p.readline()
                if not l:
                    break
                else:
                    if re.search('\S',l):
                        t.write(l)
    os.remove(filename)
    os.rename(filename+'.tmp',filename)
    print('%s 已压缩！'%filename)
def yasuo(dir_path):
    if dir_path[len(dir_path)-1] == '/':
        dir_path = dir_path[:len(dir_path)-1]
    file_list = os.listdir(dir_path)
    for i in file_list:
        if i.find('html') > 0:
            minify_html(dir_path+'/'+i)
        elif os.path.isdir(dir_path+'/'+i) and not re.match('\.|\_',i):
            yasuo("%s/%s"%(dir_path,i))

yasuo('/personal/www/www.sbblog.top')