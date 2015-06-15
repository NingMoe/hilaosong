/*
 * 文 件 名:  StringTools.java
 * 版    权:  Huawei Technologies Co., Ltd. Copyright YYYY-YYYY,  All rights reserved
 * 描    述:  <描述>
 * 修 改 人:  h00101670
 * 修改时间:  2009-2-12
 * 跟踪单号:  <跟踪单号>
 * 修改单号:  <修改单号>
 * 修改内容:  <修改内容>
 */
package com.hi.tools;

import java.io.IOException;
import java.lang.reflect.Field;
import java.lang.reflect.Method;
import java.math.BigDecimal;
import java.security.KeyFactory;
import java.security.PublicKey;
import java.security.spec.X509EncodedKeySpec;
import java.text.DecimalFormat;
import java.text.MessageFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Collection;
import java.util.Date;
import java.util.GregorianCalendar;
import java.util.Map;
import java.util.Random;
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import javax.crypto.Cipher;
import javax.servlet.http.HttpServletRequest;
import javax.xml.datatype.DatatypeFactory;
import javax.xml.datatype.XMLGregorianCalendar;

import org.apache.commons.lang.StringUtils;

import sun.misc.BASE64Decoder;

public class StringTools
{
    /**
     * 日期时间格式yyyy-MM-dd HH:mm:ss
     */
    public static final String DATETIME_PATTERN = "yyyy-MM-dd HH:mm:ss";

    public static final String SOTRETIME = "HH:mm";

    public static final String BIRTHDAY = "yyyy-MM-dd";
    
    public static final String YEAR = "yyyy";
    
    public static final String MONTH = "MM";
    
    public static final String DAY = "dd";

    public static final String IPHONETIME = "yyyy-MM-dd HH:mm";
    
    public static final String DATEBASE = "yyyy-MM-dd:HH:mm";

    public static final String DATETIME_TIME = "yyyyMMddHHmmss";

    public static final String DATATIME_PARTTERN_FILE = "yyyyMMddHHmmssS";

    /**
     * 日期格式yyyy-MM-dd
     */
    public static final String DATE_PATTERN = "yyyy-MM-dd";

    public StringTools()
    {

    }

    /**
     * 
     * 判断数组中是否包括指定的字符串
     * 
     * @param array
     * @param searchString 可为 null
     * @return
     */
    public static boolean contains(String[] array, String searchString)
    {
        if (0 == array.length)
        {
            return false;
        }
        
        for (String str : array)
        {
            if (null == str)
            {
                if (null == searchString)
                {
                    return true;
                }
                continue;
            }
            
            if (str.equals(searchString))
            {
                return true;
            }
        }
        
        return false;
    }
    /**
     * getLength 返回字符串的长度
     * 
     * @param src 输入字符串
     * @return int 字符串长度
     */

    public static int getLength(String src)
    {
        return ((null == src) || ("".equals(src))) ? 0 : src.getBytes().length;
    }

    /**
     * getLength 返回非空字符串
     * 
     * @param o 输入对象
     * @return string
     */
    public static String nvl(Object o)
    {
        return (null == o) ? "" : o.toString();
    }
    
    /**
     * 如值为 null, 则返回默认字符串
     * 
     * @param o 输入对象
     * @param defaultString 默认值
     * @return string
     */
    public static String nvl(Object o, String defaultString)
    {
        return (null == o) ? defaultString : o.toString();
    }

    /**
     * replace$ 返回字符串，将一个$更改为两个$
     * 
     * @param instr 输入字符串
     * @return String
     */
    public static String replaceDollarMark(String instr)
    {
        StringBuffer sb = new StringBuffer(instr);
        int place = sb.indexOf("$");
        while (place >= 0)
        {
            sb.replace(place, place + 1, "$$");
            place = sb.indexOf("$", place + 2);
        }
        return sb.toString();
    }

    /**
     * getMsg
     * 
     * @param value value
     * @param params params
     * @return String
     * @see [类、类#方法、类#成员]
     */
    public static String getMsg(String value, Object[] params)
    {
        try
        {
            // 格式化数据
            return MessageFormat.format(value, params);
        }
        catch (Exception ex)
        {
            return value;
        }
    }

    /**
     * fenToYuan
     * 
     * @param s s
     * @param def def
     * @return float
     * @see [类、类#方法、类#成员]
     */
    public static float fenToYuan(String s, float def)
    {
        float fee = StringTools.toFloat(s, def);
        fee = fee / 100;

        return fee;
    }

    /**
     * toFloat
     * 
     * @param s s
     * @return Float
     * @see [类、类#方法、类#成员]
     */
    public static Float toFloat(String s)
    {
        return toFloat(s, null);
    }
    
    /**
     * toFloat
     * 
     * @param s s
     * @param def def
     * @return Float
     * @see [类、类#方法、类#成员]
     */
    public static Float toFloat(String s, Float def)
    {
    	Float f = def;

        try
        {
            f = Float.valueOf(s);
        }
        catch (Exception e)
        {
            f = def;
        }
        return f;
    }

    /**
     * toDouble
     * 
     * @param s s
     * @return Double
     * @see [类、类#方法、类#成员]
     */
    public static Double toDouble(String s)
    {
        return toDouble(s, null);
    }
    
    /**
     * toDouble
     * 
     * @param s s
     * @param def def
     * @return Double
     * @see [类、类#方法、类#成员]
     */
    public static Double toDouble(String s, Double def)
    {
    	Double value = def;

        try
        {
            value = Double.valueOf(s);
        }
        catch (Exception e)
        {
            value = def;
        }

        return value;
    }
    
    /**
     * toShort
     * 
     * @param s s
     * @return Short
     * @see [类、类#方法、类#成员]
     */
    public static Short toShort(String s)
    {
        return toShort(s, null);
    }
    
    /**
     * toShort
     * 
     * @param s s
     * @param def def
     * @return Short
     * @see [类、类#方法、类#成员]
     */
    public static Short toShort(String s, Short def)
    {
    	Short value = def;

        try
        {
            value = Short.valueOf(s);
        }
        catch (Exception e)
        {
            value = def;
        }

        return value;
    }
    
    /**
     * 返回数字对应的字符串,如为 null, 则返回""
     * 
     * @param number 待处理的数字,可为 null
     * @return String
     * @see [类、类#方法、类#成员]
     */
    public static String toString(Number number)
    {
        return toString(number, null);
    }
    
    /**
     * 返回数字对应的字符串,如为 null, 则返回默认值的字符值
     * 
     * @param number 待处理的数字,可为 null
     * @param def 当 number 为null, 使用默认值
     * @return String
     * @see [类、类#方法、类#成员]
     */
    public static String toString(Number number, Number def)
    {
        if (null == number)
        {
            return null == def ? "" : def.toString();
        }
        
        return number.toString();
    }
    
    /**
     * toInt
     * 
     * @param s s
     * @return Integer
     * @see [类、类#方法、类#成员]
     */
    public static Integer toInt(String s)
    {
    	return toInt(s, null);
    }

    /**
     * toInt
     * 
     * @param s s
     * @param def def
     * @return Integer
     * @see [类、类#方法、类#成员]
     */
    public static Integer toInt(String s, Integer def)
    {
    	Integer value = def;

        try
        {
            value = Integer.valueOf(s);
        }
        catch (Exception e)
        {
            value = def;
        }

        return value;
    }

    /**
     * toLong
     * 
     * @param s s
     * @return Long
     * @see [类、类#方法、类#成员]
     */
    public static Long toLong(String s)
    {
    	return toLong(s, null);
    }
    
    /**
     * toLong
     * 
     * @param s s
     * @param def def
     * @return Long
     * @see [类、类#方法、类#成员]
     */
    public static Long toLong(String s, Long def)
    {
    	Long value = def;

        try
        {
            value = Long.valueOf(s);
        }
        catch (Exception e)
        {
            value = def;
        }

        return value;
    }


    /**
     * 将字符串转换成日期形 参数：time，String，日期字符串 pattern, String, 解析的格式 返回：Date，日期形
     * 
     * @param time time
     * @param pattern pattern
     * @return Date
     * @see [类、类#方法、类#成员]
     */
    public static Date timeStr2Date(String time, String pattern)
    {
        if (null == time)
        {
            throw new IllegalArgumentException("time parameter can not be null");
        }
        if (null == pattern)
        {
            throw new IllegalArgumentException(
                    "pattern parameter can not be null");
        }
        SimpleDateFormat sdf = new SimpleDateFormat(pattern);
        try
        {
            return sdf.parse(time);
        }
        catch (ParseException e)
        {
            throw new IllegalArgumentException("using [" + pattern
                    + "] parse [" + time + "] failed");
        }
    }

    /**
     * 将日期型转换成字符串 参数：time，Date pattern, String, 转换的目标格式<一句话功能简述> <功能详细描述>
     * 
     * @param time time
     * @param pattern pattern
     * @return String
     * @see [类、类#方法、类#成员]
     */
    public static String date2TimeStr(Date time, String pattern)
    {
        if (null == pattern)
        {
            throw new IllegalArgumentException(
                    "pattern parameter can not be null");
        }
        if (null == time)
        {
            throw new IllegalArgumentException("time parameter can not be null");
        }
        SimpleDateFormat sdf = new SimpleDateFormat(pattern);
        return sdf.format(time);
    }

    /**
     * 元转分
     * 
     * @param s s
     * @param def def
     * @return int
     * @see [类、类#方法、类#成员]
     */
    public static int yuanToFen(String s, int def)
    {
        float yuan = StringTools.toFloat(s, (float)def);
        int fen = (int) (yuan * 100);

        return fen;
    }

    /**
     * 去掉两位的打折数字的末位0
     * 
     * @param discount discount
     * @return String
     * @see [类、类#方法、类#成员]
     */
    public static String convertDiscount(String discount)
    {
        if (discount == null || "".equals(discount.trim()))
        {
            return "";
        }
        else if (discount.endsWith("0"))
        {
            return discount.substring(0, discount.length() - 1);
        }
        else
        {
            return discount;
        }
    }

    /**
     * 如果一个字符串没有给定值或为空，则给定一个默认值
     * 
     * @param s 如果一个字符串没有给定值或为空，则给定一个默认值
     * @param def def
     * @return String
     * @see [类、类#方法、类#成员]
     */
    public static String asDefault(String s, String def)
    {
        if ((s == null) || "".equals(s.trim()))
        {
            return def;
        }
        else
        {
            return s;
        }
    }

    /**
     * yyyy-MM-ddTHH:mm:ss.SSSzzzzz格式字符串转换成日期类型
     * 
     * @param s s
     * @param errorMessage errorMessage
     * @return Date
     * @throws ParameterException ParameterException
     * @see [类、类#方法、类#成员]
     */
    public static Date xmlDateTimeStr2XMLDateTime(String s, String errorMessage)
            throws Exception
    {
        if (isEmpty(s) || s.length() < 19)
        {
            throw new Exception(errorMessage);
        }
        else
        {
            try
            {
                // 先验证yyyy-MM-ddTHH:mm:ss格式
                String tmp = s.substring(0, 19);
                timeStr2Date(tmp.replace("T", " "), DATETIME_PATTERN);

                XMLGregorianCalendar calendar = DatatypeFactory.newInstance().newXMLGregorianCalendar(
                        s);
                return calendar.toGregorianCalendar().getTime();
            }
            catch (Exception e)
            {
                throw new Exception(errorMessage);
            }
        }
    }

    /**
     * 日期类型转换成yyyy-MM-ddTHH:mm:ss.SSSzzzzz+08.00格式字符串
     * 
     * @param date date
     * @param errorMessage errorMessage
     * @return String
     * @throws ParameterException ParameterException
     * @see [类、类#方法、类#成员]
     */
    public static String xmlDateTime2xmlDateTimeStr(Date date,
            String errorMessage) throws Exception
    {
        if (date == null)
        {
            throw new Exception(errorMessage);
        }
        else
        {
            Calendar ca = Calendar.getInstance();
            ca.setTime(date);
            XMLGregorianCalendar calendar;
            try
            {
                calendar = DatatypeFactory.newInstance().newXMLGregorianCalendar(
                        (GregorianCalendar) ca);
            }
            catch (Exception e)
            {
                throw new Exception(errorMessage);
            }
            return calendar.toString();
        }
    }

    /**
     * yyyy-MM-ddzzzzz格式字符串转换成日期类型
     * 
     * @param s s
     * @param errorMessage errorMessage
     * @return Date
     * @throws ParameterException ParameterException
     * @see [类、类#方法、类#成员]
     */
    public static Date xmlDateStr2XMLDate(String s, String errorMessage)
            throws Exception
    {
        if (isEmpty(s) || s.length() < 10)
        {
            throw new Exception(errorMessage);
        }
        else
        {
            try
            {
                // 先验证yyyy-MM-dd格式
                String tmp = s.substring(0, 10);
                timeStr2Date(tmp, DATE_PATTERN);

                XMLGregorianCalendar calendar = DatatypeFactory.newInstance().newXMLGregorianCalendar(
                        s);
                return calendar.toGregorianCalendar().getTime();
            }
            catch (Exception e)
            {
                throw new Exception(errorMessage);
            }
        }
    }

    /**
     * 日期类型转换成yyyy-MM-ddzzzzz格式字符串
     * 
     * @param date date
     * @param errorMessage errorMessage
     * @return String
     * @throws ParameterException ParameterException
     * @see [类、类#方法、类#成员]
     */
    public static String xmlDate2xmlDateStr(Date date, String errorMessage)
            throws Exception
    {
        if (date == null)
        {
            throw new Exception(errorMessage);
        }
        else
        {
            Calendar ca = Calendar.getInstance();
            ca.setTime(date);
            XMLGregorianCalendar calendar;
            try
            {
                calendar = DatatypeFactory.newInstance().newXMLGregorianCalendar(
                        (GregorianCalendar) ca);
                int year = calendar.getYear();
                int month = calendar.getMonth();
                int day = calendar.getDay();
                // BigInteger eon = calendar.getEon();
                int timezone = calendar.getTimezone();
                BigDecimal fractionSecond = calendar.getFractionalSecond();

                calendar.clear();
                calendar.setYear(year);
                calendar.setMonth(month);
                calendar.setDay(day);
                calendar.setFractionalSecond(fractionSecond);
                calendar.setTimezone(timezone);
            }
            catch (Exception e)
            {
                throw new Exception(errorMessage);
            }
            return calendar.toString();
        }
    }

    /**
     * 允许null对象的trim方法
     * 
     * @param str str
     * @return [参数说明]
     */
    public static String trim(String str)
    {
        return str == null ? null : str.trim();
    }

    /**
     * 判断字符串是否为null对象或是空白字符
     * 
     * @param str str
     * @return boolean
     * @see [类、类#方法、类#成员]
     */
    public static boolean isEmpty(String str)
    {
        return (str == null) || (str.trim().length() == 0);
    }
    
    /**
     * 判断字符串不为null且不为全空格
     * 
     * @param str str
     * @return boolean
     * @see [类、类#方法、类#成员]
     */
    public static boolean isNotEmpty(String str)
    {
        return !isEmpty(str);
    }

    public static String getAction(HttpServletRequest request)
    {
        String[] path = request.getRequestURI().split("/");

        return path[path.length - 1].trim();
    }

    /**
     * <一句话功能简述>将yyyy-MM-dd HH:mm:ss 格式的字符串转换成对应的日期 <功能详细描述>
     * 
     * @param s
     * @param errorMessage
     * @return
     * @throws ParameterException
     * @see [类、类#方法、类#成员] public static Date dateTimeStr2Date(String s,String
     *      errorMessage) throws ParameterException { Date date = null; if ((s ==
     *      null) || "".equals(s.trim())) { throw new
     *      ParameterException(errorMessage); } else { try { SimpleDateFormat
     *      sdf = new SimpleDateFormat ("yyyy-MM-dd HH:mm:ss"); date =
     *      sdf.parse(s); } catch (Exception e) { throw new
     *      ParameterException(errorMessage); } } return date; }
     */
    /*
     * public static void main(String[] args) { try {
     * System.out.println(xmlDateTimeStr2XMLDateTime("2008-01-02T12:30:01.001+08:00",
     * "Error DateTime Format"));
     * System.out.println(xmlDateTimeStr2XMLDateTime("2008-01-02T12:30:01.001-08:00",
     * "Error DateTime Format"));
     * System.out.println(xmlDateTimeStr2XMLDateTime("2008-01-02T12:30:01.001Z",
     * "Error DateTime Format"));
     * System.out.println(xmlDateTimeStr2XMLDateTime("2008-01-02T12:30:01.001",
     * "Error DateTime Format"));
     * System.out.println(xmlDateStr2XMLDate("2008-01-02+08:00", "Error Date
     * Format")); System.out.println(xmlDateStr2XMLDate("2008-01-02Z", "Error
     * Date Format")); System.out.println(xmlDateStr2XMLDate("2008-11-19",
     * "Error Date Format")); } catch (ParameterException e) { // TODO
     * Auto-generated catch block e.printStackTrace(); } }
     */

    public static String replaceBlank(String str)
    {
        Pattern p = Pattern.compile("\\s*|\t|\r|\n");
        Matcher m = p.matcher(str);
        return m.replaceAll("");
    }

    /**
     * [简要描述]:字符串转换成双精度型,保留小数点后两位
     * 
     * @author zoubo
     * @param data
     * @return
     */
    public static double strToDouble(String data)
    {
        double result = 0;
        try
        {
            result = Double.parseDouble(data);
            DecimalFormat df = new DecimalFormat("#.00");
            String resultStr = df.format(result);
            result = Double.parseDouble(resultStr);
        }
        catch (Exception e)
        {
            result = 0;
        }
        return result;
    }

    /**
     * [简要描述]:double转换成String
     * 
     * @author zhangjun0330
     * @param data
     * @return
     */
    public static String double2Str(double data)
    {
        try
        {
            DecimalFormat df = new DecimalFormat("0.00");
            String resultStr = df.format(data);
            return resultStr;
        }
        catch (Exception e)
        {
            return "";
        }
    }

    /**
     * [简要描述]:判断map是否为空
     * 
     * @author zhangjun0330
     * @param map
     * @return
     */
    public static boolean isMapStrBank(Map<String, String> map)
    {
        return ((map == null) || (map.isEmpty()));
    }

    /**
     * [简要描述]:toString 对象属性打印
     * 
     * @author zhangjun0330
     * @param object obj
     * @return StringBuffer
     */
    @SuppressWarnings("unchecked")
    public static String bean2String(Object object)
    {
        if (null == object)
        {
            return null;
        }
        Class classObj = object.getClass();
        //
        if (classObj == String.class)
        {
            return (String) object;
        }
        StringBuffer sb = new StringBuffer();
        try
        {
            // 类中字段数组
            Field[] fields = classObj.getDeclaredFields();
            sb.append(classObj.getName()).append("{");
            for (int i = 0; i < fields.length; i++)
            {
                Field f = fields[i];
                // 获取属性名
                String fieldName = f.getName();
                String stringLetter = fieldName.substring(0, 1).toUpperCase();
                // 获取get方法
                String getName = "get" + stringLetter + fieldName.substring(1);
                Class classType = object.getClass();
                // 获取相应的方法
                Method getMethod = classType.getMethod(getName, new Class[] {});
                // 调用源对象的getXXX（）方法
                Object value = getMethod.invoke(object, new Object[] {});
                // 属于list,递归处理
                if (value instanceof Collection)
                {
                    // 递归
                }
                else
                {
                    sb.append(fieldName).append("=").append(value).append(";");
                }
            }
        }
        catch (Exception e)
        {
            e.printStackTrace();
        }
        sb.append("}");
        return sb.toString();
    }
    
    public static Date addDay(Date date, int i)
    {
      return new Date(date.getTime() + i * 86400000L);
    }

    /**
     * 简要描述: 将模糊查询字符串过滤 '%', '_'
     * @author chenbing
     * @param value
     * @return
     */
    public static String filterSqlParam(String value)
    {
    	if (isEmpty(value))
    	{
    		return value;
    	}
    	
    	value = value.replace("%", "!%");
    	value = value.replace("_", "!_");
    	return value;
    }
    
    /**
     * 简要描述: 将模糊查询字符串过滤 '%', '_'
     * @author chenbing
     * @param map 查询条件集合
     * @param paramKeys 要过滤的查询条件名称
     * @return
     */
    public static void filterSqlParam(Map<String, Object> map, String[] paramKeys)
    {
    	if (null == map || null == paramKeys || paramKeys.length == 0)
    	{
    		return;
    	}
    	
    	for (String paramKey : paramKeys)
    	{
    		if (map.containsKey(paramKey))
    		{
    			map.put(paramKey, filterSqlParam((String)map.get(paramKey)));
    		}
    	}
    }
    
    /**
     * 
     * @param str
     * @return
     * @throws IOException 
     */
    public static String judgeAndDecoderBASE64(String str) throws IOException {
		String regEx = "^([A-Za-z0-9+/]{4})*([A-Za-z0-9+/]{4}|[A-Za-z0-9+/]{3}=|[A-Za-z0-9+/]{2}==)$";
		Pattern pat = Pattern.compile(regEx);
		Matcher mat = pat.matcher(str);
		boolean rs = mat.find();
		if(rs){
			 str = new String(new BASE64Decoder().decodeBuffer(str));
		}
		return str;
	}
    
    public static void main(String[] args) throws Exception
    {
//        System.out.println(encrtyRSA("MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCDgcwQEG1T13CWlGQ1lIXL0xNr0wmsLhWryG1bQM9TT+EEjV3Fo6xB2ztw2qSMHTUESULnHt5EByTmTV8/ji24CP8juUNfn7E1CYfE3LA7eCbCVhO7ul2k+BQNJHZmdNJ5Rqk6v0avEpFC2iY03za9dXabfdAODpqPVk398MN86wIDAQAB","1"));
        String localUrl = "http://124.127.49.37:7070/haidilao/User/UserHeadImage/230X230/1344910810170.jpg";
        localUrl = localUrl.substring(localUrl.indexOf("User"));
        System.out.println(localUrl);
    }
	/**
	 * 生成指定位数的随机字符串
	 * 
	 * @param length
	 * @return
	 * 
	 * @author xiayang
	 */
	public static String stringGen(int length) {
		Random randGen = new Random();
		char[] numbersAndLetters = ("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ")
				.toCharArray();
		if (length < 1) {
			return null;
		}
		char[] randBuffer = new char[length];
		for (int i = 0; i < randBuffer.length; i++) {
			randBuffer[i] = numbersAndLetters[randGen.nextInt(51)];
		}
		return new String(randBuffer);
	}
	
	/**
     * 
     * @Title : filter
     * @Type : FilterStr
     * @date : 2014年3月12日 下午9:17:22
     * @Description : 过滤出字母、数字和中文
     * @param character
     * @return
     */
    public static String filter(String character)
    {
        character = character.replaceAll("[^(a-zA-Z0-9\\u4e00-\\u9fa5)]", "");
        return character;
    }
    /**
     *@param  
     */
    public static String createPrintTypeXml(String printCode){
    	StringBuffer sb=new StringBuffer();
		if(StringUtils.isNotBlank(printCode)&&"weixin".equals(printCode)){
		     sb.append("<wxCode>").append(printCode).append("</wxCode>");
		}else{
			sb.append("<wxCode>").append("</wxCode>");
		}
		if(StringUtils.isNotBlank(printCode)&&"baidu".equals(printCode)){
			sb.append("<baiduCode>").append(printCode).append("</baiduCode>");
		}else{
			sb.append("<baiduCode>").append("</baiduCode>");
		}
		if(StringUtils.isNotBlank(printCode)&&"alipay".equals(printCode)){
			sb.append("<alipayCode>").append(printCode).append("</alipayCode>");
		}else{
			sb.append("<alipayCode>").append("</alipayCode>");
		}
    	return sb.toString();
    }
    
    /**
     * 处理sns图片地址
     * @param uri
     * @param type
     * @return
     */
    public static String repSnsPic(String uri ,String type){
		int lind = uri.lastIndexOf("/");
		if(uri.indexOf(type)>0){
			return uri;
		}
		if(uri.indexOf("min")>0){
			return uri.replace("min", type);
		}
		if(uri.indexOf("mid")>0){
			return uri.replace("mid", type);
		}
		if(uri.indexOf("max")>0){
			return uri.replace("max", type);
		}
		String result = uri.substring(0, lind+1)+type+"/"+uri.substring(lind+1);
		return result;
	}
}