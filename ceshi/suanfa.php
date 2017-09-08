<?php

//<!--#include <cstdio>-->
//<!--#include <map>-->
//<!--using std::multimap;-->
//<!--using std::make_pair;-->
//<!--multimap<long,long> task;long n;-->
//<!--const long oo = 0x7fff0000;-->
//<!--long d[502];-->
//<!--long w[502];-->
//<!--long maxd = 0;-->
//<!---->
//<!--struct node-->
//<!--{-->
//<!--    long w;-->
//<!--    node* next;-->
//<!--};-->
//<!--node* tim[502];-->
//<!--long tot = 0;-->
//<!---->
//<!--void ins(long d,long w)-->
//<!--{-->
//<!--    node* tmp = new node;-->
//<!--    tmp->w = w;-->
//<!--    tmp->next = tim[d];-->
//<!--    tim[d] = tmp;-->
//<!--}-->
//<!---->
//<!--int main()-->
//<!--{-->
//<!--freopen("task.in","r",stdin);-->
//<!--    freopen("task.out","w",stdout);-->
//<!---->
//<!--    scanf("%ld",&n);-->
//<!--    for (long i=1;i<n+1;i++)-->
//<!--    {-->
//<!--        scanf("%ld",d+i);-->
//<!--        maxd >?= d[i];-->
//<!--    }-->
//<!--    for (long i=1;i<n+1;i++)-->
//<!--    {-->
//<!--        scanf("%ld",w+i);-->
//<!--        tot += w[i];-->
//<!--    }-->
//<!--    for (long i=1;i<n+1;i++)-->
//<!--    {-->
//<!--        ins(d[i],-w[i]);-->
//<!--    }-->
//<!---->
//<!--    long ans = 0;-->
//<!--    for (long i=maxd;i>0;i--)-->
//<!--    {-->
//<!--        node* ths = tim[i];-->
//<!--        while (ths)-->
//<!--        {-->
//<!--            task.insert(make_pair(ths->w,ths->w));-->
//<!--            ths = ths->next;-->
//<!--        }-->
//<!--        if (!task.empty())-->
//<!--        {-->
//<!--            long ttt = task.begin()->first;-->
//<!--            ans += ttt;-->
//<!--            task.erase(task.begin());-->
//<!--        }-->
//<!--    }-->
//<!--    if (tot+ans<0) printf("0");-->
//<!--    else printf("%ld",tot+ans);-->
//<!---->
//<!--    return 0;-->
//<!--}-->

//
//

/*我们要求找出具有下列性质数的个数(包含输入的自然数n):
先输入一个自然数n(n≤1000)，然后对此自然数按照如下方法进行处理
l·不作任何处理:
2·茬它的左边加上一个自然数，但该自然数不能超过原数的一半;
3·加上数后，继续按此规则进行处理，直到不能再立生自然数为止。

输入格式
自然数n
输出格式
满足条件的数的个数

样例输入
6
样例输出
6

答案解释
6->
6,16,26,36->
6,16,26,36,126,136共6个。
另一个
8->
8,18,28,38,48->
8,18,28,38,48,128,138,148,248->
8,18,28,38,48,128,138,148,248,1248->共10个。*/


/**
 *
 *
 * #include<iostream>
    #include <conio.h>
    using namespace std;


    int arr[501][1001];
    int main()
    {
    int n=8;
    cin>>n;
    for(int i=0;i<=500;i++)
    {
    for(int j=0;j<=1000;j++)
    {
    arr[i][j]=0;
    }
    }
    for(int i=1;i<=1000;i++)
    {
    arr[0][i]=1;
    }
    for(int i=0;i<=n;i++)
    {
    for(int j=1;j<=i/2;j++)
    {
    for(int k=0;k<j;k++)
    {
    arr[j][i]+=arr[k][j];
    }
    }
    }
    int sum=0;
    for(int i=0;i<=n/2;i++)
    {
    sum+=arr[i][n];
    }
    cout<<sum<<endl;

    system("pause");
    return 0;
    }
 *
 */


